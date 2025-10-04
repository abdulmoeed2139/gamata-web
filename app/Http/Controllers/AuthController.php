<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // Show login form
    public function loginForm()
    {
        return view('auth.login');
    }

    // Login process
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('auth.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // Show register form
    public function registerForm()
    {
        return view('auth.register');
    }

    // Register new user
    public function register(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required|email',
            'Phone' => 'required|min:9',
            'password' => 'required|confirmed|min:8',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } else {
            $response= Http::post('http://feapi.aethriasolutions.com/api/v1/Account/UserSignUp', [
                'firstName' => $request->first_name,
                'lastName' => $request->last_name,
                'email' => $request->email,
                'phoneNumber' => $request->phone,
                'Password' => $request->password,
            ]);
            $responseData = $response->json();
            return redirect()->back()->with('message', $responseData['text'] ?? 'Something went wrong');
        }

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // return redirect()->route('login.form')->with('success', 'Account created, please login.');
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect()->back();
    }

    // Send OTP
    public function sendOtp($mobile)
    {
        $response = Http::acceptJson()->get('http://feapi.aethriasolutions.com/api/v1/Account/SendOtp', [
            'mobile' => $mobile,
            'lan' => 'en'
        ]);
        return response()->json(['message' => $response->json()['text']]);
    }

    public function verifyNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string|min:9|max:15'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first('mobile')
            ], 422);
        }
        $mobile = $request->input('mobile');
        $response = Http::acceptJson()->get('http://feapi.aethriasolutions.com/api/v1/Account/VerifyMobileNumber', [
            'mobile' => $mobile,
            'lan'    => 'Si'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['status']) && strtolower($data['status']) === 's') {

                return $this->sendOtp($mobile);

            } elseif (isset($data['status']) && strtolower($data['status']) === 'error') {
                return response()->json([
                    'message' => $data['text']
                ], 404);
            } else {
                return response()->json([
                    'message' => 'Unknown Response'
                ], 400);
            }
        }

        return response()->json([
            'message' => 'Internal Server Error',
            'status'  => $response->status(),
            'error'   => $response->body()
        ], 500);

    }

    public function verifyOTP(Request $request)
    {
        $params = [
            'PhoneNumber' => $request->phoneNumber,
            'OtpCode' => $request->otpCode,
            'Lan' => 'en',
        ];

        try {
            $response = Http::withOptions([
                'verify' => false
            ])->post('http://feapi.aethriasolutions.com/api/v1/Account/SignIn?' . http_build_query($params));

            if($response->json('isAuthenticated')==true){
                $accessToken= $response->json('token');
                $token= Token::find(1);
                $token->update(['access_token' => $accessToken]);

                session([
                    'access_token' => $accessToken,
                    'phone_number' => $request->phoneNumber,
                    'is_logged_in' => true,
                ]);
            }

            return response()->json([
                'status'  => true,
                'data'    => $response->json(),
            ], 200);


        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function resendOTP(Request $request)
    {
        $mobile= $request['phoneNumber'];
        $response = Http::acceptJson()->get('http://feapi.aethriasolutions.com/api/v1/Account/ReSendOtp', [
            'mobile' => $mobile,
            'lan' => 'Si'
        ]);
        $result= $response->json()['result'];

        return response()->json(['message' => $result['text']]);
    }

}
