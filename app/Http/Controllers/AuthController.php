<?php

namespace App\Http\Controllers;

use \Exception;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    // Show login form
    public function loginForm()
    {
        if(!session('access_token')){
            return view('auth.login');
        } else {
            return redirect(app()->getLocale().'/index');
        }
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
            return redirect()->route('auth.dashboard', app()->getLocale());
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
            'phone' => 'required|min:9',
            'password' => 'required|confirmed|min:8',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } else {
            try {

                // Phone number check
                $phone = $request->phone;
                if (substr($phone, 0, 1) !== '0') {
                    $phone = '0' . $phone;
                }
                $params= [
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'email' => $request->email,
                    'phoneNumber' => $phone,
                    'Password' => $request->password,
                ];

                $response= Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])->withOptions([
                    'verify' => false
                ])->post('http://feapi.aethriasolutions.com/api/v1/Account/UserSignUp', $params);
                $responseData = $response->json();
                if($responseData['text']== 'Email '.$request->email.' is already registered.'){
                    return redirect()->back()->with('message', $responseData['text']);
                }
                return redirect(app()->getLocale().'/login')->with('message', $responseData['text'] ?? 'Something went wrong');
            } catch (Exception $exp) {
                return redirect()->back()->with('message', $exp->getMessage() ?? 'Something went wrong');
            }
        }
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect(
            app()->getLocale().'/index');
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

    public function getToken(Request $request)
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
        $data= $response->json();
        if(isset($data['result'])){
            $result= $response->json()['result']['text'];
        } else {
            $result= $response->json()['text'];
        }

        return response()->json(['message' => $result]);
    }

    public function PasswordForm()
    {
        if(session('access_token')){
            return redirect()->route('index', app()->getLocale());
        } else{
            return view('auth.password-screen');
        }
    }

    public function loginByPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phoneNumber' => 'required|string|min:9|max:10',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 422);
        }
        $params= [
            'mobile' => $request['phoneNumber'],
            'password' => $request['password'],
            'lan' => 'en',
        ];

        $response = Http::asForm()->withOptions([
            'verify' => false
        ])->post('https://feapi.aethriasolutions.com/api/v1/Account/LoginByPassword', $params);
        $data= $response->json();
        if(isset($data['isAuthenticated']) && $data['isAuthenticated']==false){
            return response()->json(['message' => $data['message']], 401);
        } else {

            $accessToken= $response->json('token');
            session([
                'access_token' => $accessToken,
                'phone_number' => $request['phoneNumber'],
                'is_logged_in' => true,
            ]);

            return response()->json([
                'status'  => true,
                'data'    => $response->json(),
            ], 200);
        }
    }

    public function verifyMobileNumber(Request $request)
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
        if($request['mode']){
            $params= [
                'mobile'         => $mobile,
                'lan'            => 'en',
                'countryCode'    => '+94',
                'mode'         => $request['mode'],
            ];
        } else {
            $params= [
                'mobile'         => $mobile,
                'lan'            => 'en',
                'countryCode'    => '+94',
            ];
        }

        // dd($params);                                                       /api/v1/Account/Verify
        $response = Http::acceptJson()->get('http://feapi.aethriasolutions.com/api/v1/Account/Verify', $params);
        $data = $response->json();
        if (isset($data['status']) && strtolower($data['status']) === 's') {
            return response()->json([
                'message' => $data['result']
            ], 200);

        } elseif (isset($data['status']) && $data['status'] === 'E') {
            return response()->json([
                'message' => $data['text']
            ], 404);
        } else {
            return response()->json([
                'message' => 'Unknown Response'
            ], 400);
        }
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string|min:9|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first('mobile')
            ], 422);
        }

        $params= [
            'mobile'   => $request['mobile'],
            'otpCode'  => $request['otpCode'],
            'lan'      => 'en',
        ];

        $response = Http::acceptJson()->asForm()->post('http://feapi.aethriasolutions.com/api/v1/Account/VerifyOtp?' . http_build_query($params));
        $data = $response->json();
        // dd($data);
        if(isset($data['status']) && $data['status']=='s'){
            return response()->json(['result' => $data['result']], 200);
        } else {
            return response()->json(['message' => $data['text']], 401);
        }
    }

    // public function resetPassword(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'mobile' => 'required|string|min:9|max:10',
    //         'new_password' => 'required|min:8',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => $validator->errors()
    //         ], 422);
    //     }

    //     try {
    //         $params= [
    //             'mobile' => $request['mobile'],
    //             'newPassword' => $request['new_password'],
    //             'lan' => 'e',
    //         ];
    //         $response= Http::withOptions([
    //                 'verify' => false
    //             ])->post('http://feapi.aethriasolutions.com/api/v1/Account/ResetPassword', $params);
    //         dd($response->json(), $params);
    //     } catch (\Exception $exp) {
    //         return response()->json(['error' => $exp->getMessage()], 500);
    //     }
    // }


    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string|min:9|max:10',
            'new_password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 422);
        }

        try {
            $params = [
                'mobile' => $request->input('mobile'),
                'newPassword' => $request->input('new_password'),
                'lan' => 'en',
            ];

            $response = Http::asForm()->withOptions([
                    'verify' => false
                ])->post('http://feapi.aethriasolutions.com/api/v1/Account/ResetPassword', $params);
            $data= $response->json();
            return response()->json(['message' => $data['message']], 200);
        } catch (\Exception $exp) {
            return response()->json(['error' => $exp->getMessage()], 500);
        }
    }


}
