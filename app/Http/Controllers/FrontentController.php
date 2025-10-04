<?php
// $token= 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ5YXRodXNoYW5AZ21haWwuY29tIiwianRpIjoiYmE4ZGI2YWEtYWUxNC00MTE5LTk3NjAtYjQyZTMxNDcxOWY3IiwidWlkIjoiOGZhOTIwNjYtNTQxMi00MWI2LTllZDYtMmU5NDkzYWNlMmVkIiwiUGhvbmVOdW1iZXIiOiIwNzc3Mzk3ODYwIiwiRnVsbE5hbWUiOiJZYXRodXNoYW4gTXVydWdlc3UiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoieWF0aHVzaGFuQGdtYWlsLmNvbSIsImVtYWlsIjoieWF0aHVzaGFuQGdtYWlsLmNvbSIsInJvbGVzIjoiVXNlciIsImV4cCI6MTc1OTQ1NzA3NSwiaXNzIjoiU2VjdXJlQXBpIiwiYXVkIjoiU2VjdXJlQXBpVXNlciJ9.50AWzWloUeT249PK47z6bWykxd--NGmy9fVGMu20-CU';
// $phone = '0777397860';
namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
                $userName = 'Admin';
            }
        } else {
            $userName = 'Admin';
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
        if(session('access_token')){
            return redirect()->route('index');
        } else {
            return view('auth.verify-otp');
        }
    }

    public function blogs()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        $getBlogs = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/Blog/v1/GetAllWithOutPagination',
            $this->token ?? null
        );
        $blogs = $getBlogs->json('data');
        return view('websitePages.blogs', compact('userName','blogs'));
    }

    public function getSingleBlog($id)
    {
        $accessToken = session('access_token');
        $getBlog = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/Blog/v1/GetById/'.$id,
            $this->token ?? null
        );
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

    public function product()
    {
        $getAllProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/GetAll?items_per_page=100&page=1&Lan=En&parentId=1',
            $this->token ?? null
        );
        $responseData = $getAllProduct->json();
        $products = $responseData['data'] ?? [];
        $ctg = $responseData['payload']['categories'] ?? [];
        return view('websitePages.product', compact('products', 'ctg'));
    }

    public function producttInner($id)
    {
        $accessToken = session('access_token');
        $userName = $this->getProfile();
        $getProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Sell/GetAllSellsByProduct/?items_per_page=100&page=1&Lan=si&productId='.$id,
            $this->token ?? null
        );

        $getBestSellingProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/BestSelling',
            $this->token ?? null
        );

        if (
            $getProduct->successful() &&
            $getBestSellingProduct->successful()
        ){
            $bestSellingItems = $getBestSellingProduct->json('data') ?? [];
            $productArray = $getProduct->json()['data'] ?? [];
            $product = $productArray[0] ?? null;
            return view('websitePages.productt-inner', compact('userName', 'product', 'bestSellingItems'));
        }
    }


    public function community()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        $getCommunity = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/community/Post?items_per_page=12&sort=id&order=desc&postType=Pending&page=1',
            $this->token ?? null
        );
        if($getCommunity->successful()){
            $community = $getCommunity->json('data') ?? [];
            return view('websitePages.community', compact('userName','community'));
        }
    }


    public function appBanner()
    {
        $accessToken = session('access_token');
        $userName= $this->getProfile();
        return view('websitePages.app-banner', compact('userName'));
    }

    public function contact()
    {
        return view('websitePages.contact');
    }

    public function InsertAnonymousInquiry(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $params= [
                'Subject' => $request['subject'],
                'Message' => $request['message'],
                'FirstName' => $request['first_name'],
                'LastName' => $request['last_name'],
                'Email' => $request['email'],
            ];

            $response = Http::withOptions([
                'verify' => false
            ])->post('http://feapi.aethriasolutions.com/api/v1/UserRequest/InsertAnonymousInquiry', $params);
            $result= $response->json('text');
            return redirect()->back()->with('message', $result);
        }
    }

    public function createComment(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'comment' => 'required'
        ]);
        if($validator->fails()){
            return response()->json('error', $validator->errors());
        } else {
            $params= [
                'Comment' => $request['comment'],
                'Commented_DateTime' => $request['dateTime'],
                'FK_UserID' => $request['fK_UserID'],
                'FK_Post_Code' => $request['FK_Post_Code'],
                'Isdelete' => $request['isdelete'],
            ];
            $response = Http::withOptions([
                'verify' => false
            ])->post('http://feapi.aethriasolutions.com/api/PostComment/v1/Insert', $params);
            $resultArray = $response->json();
            $resultText = $resultArray['text'] ?? null;
            return redirect()->back()->with('message', $resultText);
        }
    }

}
