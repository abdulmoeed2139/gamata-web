<?php
// $token= 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ5YXRodXNoYW5AZ21haWwuY29tIiwianRpIjoiYmE4ZGI2YWEtYWUxNC00MTE5LTk3NjAtYjQyZTMxNDcxOWY3IiwidWlkIjoiOGZhOTIwNjYtNTQxMi00MWI2LTllZDYtMmU5NDkzYWNlMmVkIiwiUGhvbmVOdW1iZXIiOiIwNzc3Mzk3ODYwIiwiRnVsbE5hbWUiOiJZYXRodXNoYW4gTXVydWdlc3UiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoieWF0aHVzaGFuQGdtYWlsLmNvbSIsImVtYWlsIjoieWF0aHVzaGFuQGdtYWlsLmNvbSIsInJvbGVzIjoiVXNlciIsImV4cCI6MTc1OTQ1NzA3NSwiaXNzIjoiU2VjdXJlQXBpIiwiYXVkIjoiU2VjdXJlQXBpVXNlciJ9.50AWzWloUeT249PK47z6bWykxd--NGmy9fVGMu20-CU';
// $phone = '0777397860';
namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontentController extends Controller
{

    // public $token;
    // public function __construct() {
    //     // $accessToken= Token::find(1)->access_token;
    //     $accessToken = session('access_token');
    //     $this->token = $accessToken;
    // }

    public function getProfile()
    {
        $accessToken = session('access_token');
        $userName ="";
        if ($accessToken) {
            $phone = session('phone_number');
            $profileResponse = Http::withToken($accessToken)
                ->acceptJson()
                ->get("http://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en");
            $profile = $profileResponse->json('data') ?? [];
            if ($profile) {
                // $userName = ($profile['firstName'] ?? '') . ' ' . ($profile['lastName'] ?? '');
                $userName = $profile['firstName'] ?? '';
            } else {
                $userName = 'Login';
            }
        } else {
            $userName = 'Login';
        }
        return $userName;
    }

    // Helper method for API calls
    private function apiRequest($url, $token = null)
    {
        $request = Http::acceptJson();
        if ($token) {
            $request = $request->withToken($token);
        }
        return $request->get($url);
    }

    public function index()
    {
        // $accessToken = session('access_token');
        // if ($accessToken) {
        //     $phone = session('phone_number');
        //     $profileResponse = Http::withToken($accessToken)
        //         ->acceptJson()
        //         ->get("http://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en");
        //     $profile = $profileResponse->json('data') ?? [];
        //     if ($profile) {
        //         $userName = ($profile['firstName'] ?? '') . ' ' . ($profile['lastName'] ?? '');
        //     } else {
        //         $userName = 'Admindadada';
        //     }
        // } else {
        //     $userName = 'Admin';
        //     $profile = [];
        // }

        $accessToken = session('access_token');
        $userName= $this->getProfile();

        // $getBestSellingProduct = Http::withToken($accessToken)
        //     ->acceptJson()
        //     ->get('http://feapi.aethriasolutions.com/api/v1/Product/BestSelling');

        // $getExploreNetwork = Http::withToken($accessToken)
        //     ->acceptJson()
        //     ->get('http://feapi.aethriasolutions.com/api/v1/Home/ExploreNetwork');

        // $getCommunityStats = Http::withToken($accessToken)
        //     ->acceptJson()
        //     ->get('http://feapi.aethriasolutions.com/api/v1/Home/CommunityStats');

        // $getExploreTeam = Http::withToken($accessToken)
        //     ->acceptJson()
        //     ->get('http://feapi.aethriasolutions.com/api/v1/Home/ExploreTeam');


        $getBestSellingProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/BestSelling',
            $this->token ?? null
        );

        $getExploreNetwork = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Home/ExploreNetwork',
            $this->token ?? null
        );

        $getCommunityStats = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Home/CommunityStats',
            $this->token ?? null
        );

        $getExploreTeam = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Home/ExploreTeam',
            $this->token ?? null
        );

        if (
            $getBestSellingProduct->successful() &&
            $getExploreNetwork->successful()  &&
            $getCommunityStats->successful() &&
            $getExploreTeam->successful()
        ){

            $bestSellingItems = $getBestSellingProduct->json('data') ?? [];
            $exploreNetwork = $getExploreNetwork->json('result') ?? [];

            $exploreTeam = $getExploreTeam->json('result') ?? [];
            $exploreTeamText = $getExploreTeam->json('text') ?? [];

            $result = $getCommunityStats->json('result') ?? [];
            $communityText = $getCommunityStats->json('text') ?? [];
            $communityStats = [
                [
                    "icon" => "#com_1",
                    "title" => $result['registeredUsers'] ?? 'N/A',
                    "sub_title" => "Registered Users",
                    "desc" => "At Gamata.com, we are proud to connect farmers, consumers, and agricultural enthusiasts in a thriving online ecosystem."
                ],
                [
                    "icon" => "#com_2",
                    "title" => $result['freshProducts'] ?? 'N/A',
                    "sub_title" => "Fresh Products",
                    "desc" => "Offering a wide range of fresh vegetables, farm supplies, and essential products, all conveniently in one place."
                ],
                [
                    "icon" => "#com_3",
                    "title" => $result['deliveries'] ?? 'N/A',
                    "sub_title" => "Deliveries",
                    "desc" => "Building strong connections between farms and homes across regions, fostering community and sustainable living."
                ]
            ];

            return view('websitePages.index', compact(
                'userName',
                'bestSellingItems',
                'exploreNetwork',
                'communityStats',
                'communityText',
                'exploreTeam',
                'exploreTeamText',
            ));
        }
        return view('websitePages.index', ['bestSellingItems' => []]);
    }

    public function verifyOTP()
    {
        return view('auth.verify-otp');
    }

    public function blogs()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();

        $getBlogs = Http::withToken($accessToken)
            ->acceptJson()
            ->get('http://feapi.aethriasolutions.com/api/Blog/v1/GetAllWithOutPagination');
        $blogs = $getBlogs->json('data');
        return view('websitePages.blogs', compact('userName','blogs'));
    }

    public function getSingleBlog($id)
    {
        $accessToken = session('access_token');
        $getBlog = Http::withToken($accessToken)
            ->acceptJson()
            ->get('http://feapi.aethriasolutions.com/api/Blog/v1/GetById/'.$id);
        $blog = $getBlog->json('data');
        return response()->json([
            'data' => $blog,
        ], 200);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $apiResponse = Http::asForm()
            ->post('http://feapi.aethriasolutions.com/api/v1/subscribe/Insert', [
                'email' => $request->email,
            ]);

        $response = $apiResponse->json();

        return response()->json([
            'msg' => $response['text'] ?? 'Unknown response'
        ], 200);
    }

    public function producttInner()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        return view('websitePages.productt-inner', compact('userName'));
    }

    public function community()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        return view('websitePages.community', compact('userName'));
    }


    public function appBanner()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        return view('websitePages.app-banner', compact('userName'));
    }



}
