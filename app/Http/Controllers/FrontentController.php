<?php
// $phone = '0777397860';
namespace App\Http\Controllers;

use \Exception;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class FrontentController extends Controller
{

    // public function getProfile()
    // {
    //     $accessToken = session('access_token');
    //     $userName ="";
    //     if ($accessToken) {
    //         $phone = '0'.session('phone_number');
    //         $profileResponse = Http::withToken($accessToken)
    //             ->acceptJson()
    //             ->get("http://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en");
    //         $profile = $profileResponse->json('data') ?? [];
    //         if ($profile) {
    //             $userName = $profile['firstName'] ?? '';
    //             $code = $profile['code'];
    //         } else {
    //             $userName = 'Admin';
    //             $code = '';
    //         }
    //     } else {
    //         $userName = 'Admin';
    //         $code = '';
    //     }

    //     return [
    //         'username' => $userName,
    //         'FK_UserID' => $code,
    //     ];
    // }

    public function getProfile()
    {
        try {
            $accessToken = session('access_token');
            $userName ="";
            if ($accessToken) {
                $phone = '0'.session('phone_number');
                $profileResponse = Http::withToken($accessToken)
                    ->acceptJson()
                    ->get("http://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en");
                $profile = $profileResponse->json('data') ?? [];
                if ($profile) {
                    $userName = $profile['firstName'] ?? '';
                    $code = $profile['code'];
                } else {
                    $userName = 'Login';
                    $code = '';
                }
            } else {
                $userName = 'Login';
                $code = '';
            }

            return [
                'username' => $userName,
                'FK_UserID' => $code,
            ];
        } catch (\Exception $e) {
            // Exception message ko return array me bhi dal diya
            return [
                'username' => 'Admin',
                'FK_UserID' => '',
                'error' => $e->getMessage(),
            ];
        }
    }


    // // Helper method for API calls
    // private function apiRequest($url, $token = null)
    // {
    //     $request = Http::acceptJson();
    //     if ($token) {
    //         $request = $request->withToken($token);
    //     }
    //     return $request->get($url);
    // }

    private function apiRequest($url, $token = null)
    {
        try {
            $request = Http::acceptJson();
            if ($token) {
                $request = $request->withToken($token);
            }
            return $request->get($url);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }


    // public function index()
    // {
    //     $accessToken = session('access_token');
    //     $profile= $this->getProfile();
    //     $username= $profile['username'];

    //     $getBestSellingProduct = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/Product/BestSelling',
    //         $this->token ?? null
    //     );

    //     $getExploreNetwork = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/Home/ExploreNetwork',
    //         $this->token ?? null
    //     );

    //     $getCommunityStats = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/Home/CommunityStats',
    //         $this->token ?? null
    //     );

    //     $getExploreTeam = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/Home/ExploreTeam',
    //         $this->token ?? null
    //     );

    //     if (
    //         $getBestSellingProduct->successful() &&
    //         $getExploreNetwork->successful()  &&
    //         $getCommunityStats->successful() &&
    //         $getExploreTeam->successful()
    //     ){

    //         $bestSellingItems = $getBestSellingProduct->json('data') ?? [];
    //         $exploreNetwork = $getExploreNetwork->json('result') ?? [];

    //         $exploreTeam = $getExploreTeam->json('result') ?? [];
    //         $exploreTeamText = $getExploreTeam->json('text') ?? [];

    //         $result = $getCommunityStats->json('result') ?? [];
    //         $communityText = $getCommunityStats->json('text') ?? [];
    //         $communityStats = [
    //             [
    //                 "icon" => "#com_1",
    //                 "title" => $result['registeredUsers'] ?? 'N/A',
    //                 "sub_title" => "Registered Users",
    //                 "desc" => "At Gamata.com, we are proud to connect farmers, consumers, and agricultural enthusiasts in a thriving online ecosystem."
    //             ],
    //             [
    //                 "icon" => "#com_2",
    //                 "title" => $result['freshProducts'] ?? 'N/A',
    //                 "sub_title" => "Fresh Products",
    //                 "desc" => "Offering a wide range of fresh vegetables, farm supplies, and essential products, all conveniently in one place."
    //             ],
    //             [
    //                 "icon" => "#com_3",
    //                 "title" => $result['deliveries'] ?? 'N/A',
    //                 "sub_title" => "Deliveries",
    //                 "desc" => "Building strong connections between farms and homes across regions, fostering community and sustainable living."
    //             ]
    //         ];

    //         return view('websitePages.index', compact(
    //             'username',
    //             'bestSellingItems',
    //             'exploreNetwork',
    //             'communityStats',
    //             'communityText',
    //             'exploreTeam',
    //             'exploreTeamText',
    //         ));
    //     }
    //     return view('websitePages.index', ['bestSellingItems' => []]);
    // }

    public function index()
    {
        try {
            $accessToken = session('access_token');
            $profile = $this->getProfile();
            $username = $profile['username'];

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
                $getExploreNetwork->successful() &&
                $getCommunityStats->successful() &&
                $getExploreTeam->successful()
            ) {

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
                    'username',
                    'bestSellingItems',
                    'exploreNetwork',
                    'communityStats',
                    'communityText',
                    'exploreTeam',
                    'exploreTeamText',
                ));
            }

            return view('websitePages.index', ['bestSellingItems' => []]);
        } catch (\Exception $e) {
            // Exception message ko log ya array me return kar sakte ho
            return view('websitePages.index', [
                'bestSellingItems' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }


    public function verifyOTP()
    {
        if(session('access_token')){
            return redirect()->route('index');
        } else {
            return view('auth.verify-otp');
        }
    }

    // public function blogs()
    // {
    //     $accessToken = session('access_token');
    //     $profile= $this->getProfile();
    //     $username= $profile['username'];
    //     $getBlogs = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/Blog/v1/GetAllWithOutPagination',
    //         $this->token ?? null
    //     );
    //     $blogs = $getBlogs->json('data');
    //     return view('websitePages.blogs', compact('username','blogs'));
    // }

    public function blogs()
    {
        try {
            $accessToken = session('access_token');
            $profile = $this->getProfile();
            $username = $profile['username'];
            $getBlogs = $this->apiRequest(
                'http://feapi.aethriasolutions.com/api/Blog/v1/GetAllWithOutPagination',
                $this->token ?? null
            );

            $blogs = $getBlogs->json('data') ?? [];
            return view('websitePages.blogs', compact('username', 'blogs'));
        } catch (\Exception $e) {
            return view('websitePages.blogs', [
                'username'  => 'Admin',
                'blogs'     => [],
                'error'     => $e->getMessage(),
            ]);
        }
    }


    // public function getSingleBlog($id)
    // {
    //     $accessToken = session('access_token');
    //     $getBlog = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/Blog/v1/GetById/'.$id,
    //         $this->token ?? null
    //     );
    //     $blog = $getBlog->json('data');
    //     return response()->json([
    //         'data' => $blog,
    //     ], 200);
    // }

    public function getSingleBlog($id)
    {
        try {
            $accessToken = session('access_token');
            $getBlog = $this->apiRequest(
                'http://feapi.aethriasolutions.com/api/Blog/v1/GetById/' . $id,
                $this->token ?? null
            );

            $blog = $getBlog->json('data') ?? [];
            return response()->json([
                'data' => $blog,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'data' => $e->getMessage(),
            ], 500);
        }
    }


    // public function subscribe(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email'
    //     ]);

    //     $apiResponse = Http::asForm()
    //         ->post('http://feapi.aethriasolutions.com/api/v1/subscribe/Insert', [
    //             'email' => $request->email,
    //         ]);
    //     $response = $apiResponse->json();

    //     return response()->json([
    //         'msg' => $response['text'] ?? 'Unknown response'
    //     ], 200);
    // }

    public function subscribe(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
            ], 500);
        }
    }


    public function product()
    {
        $profile = $this->getProfile();
        $username = $profile['username'];
        $getAllProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/GetAll?items_per_page=100&page=1&Lan=En&parentId=1',
            $this->token ?? null
        );
        $responseData = $getAllProduct->json();
        $products = $responseData['data'] ?? [];
        $ctg = $responseData['payload']['categories'] ?? [];
        return view('websitePages.product', compact('products', 'ctg', 'username'));
    }

    public function producttInner($sellcode)
    {
        $accessToken = session('access_token');
        $profile= $this->getProfile();
        $username= $profile['username'];
        $getProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/ViewMore/6?mobile=0776563157&lan=En&parent=0'.$sellcode,
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
            $product = $getProduct->json()['data'] ?? [];
            // $product = $productArray[0] ?? null;
            return view('websitePages.productt-inner', compact('username', 'product', 'bestSellingItems'));
        }
    }


    public function relatedProducts($childCode)
    {
        $accessToken = session('access_token');
        $profile= $this->getProfile();
        $username= $profile['username'];
        $getRelatedProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Sell/GetAllSellsByProduct/?items_per_page=100&page=1&Lan=si&productId='.$childCode,
            $this->token ?? null
        );

        if ($getRelatedProduct->successful()) {
            $productArray = $getRelatedProduct->json()['data'] ?? [];
            if (empty($productArray)) {
                return response()->json(['message' => 'Product not found']);
            }
            return response()->json(['related_products' => $productArray], 200);
        }
    }


    // public function community()
    // {
    //     $accessToken = session('access_token');
    //     $profile= $this->getProfile();
    //     $username= $profile['username'];
    //     $params= 'items_per_page=12&sort=id&order=desc&postType=Pending&page=1';
    //     $getCommunity = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/community/Post?items_per_page=50&order=desc&postType=Pending&page=1',
    //         $this->token ?? null
    //     );
    //     if($getCommunity->successful()){
    //         $community = $getCommunity->json('data') ?? [];
    //         return view('websitePages.community', compact('username','community'));
    //     }
    // }

    public function community()
    {
        $accessToken = session('access_token');
        $profile = $this->getProfile();
        $username = $profile['username'];
        $getCommunity = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/community/Post?items_per_page=50&order=desc&postType=Pending&page=1',
            $this->token ?? null
        );

        if ($getCommunity->successful()) {
            $community = $getCommunity->json('data') ?? [];
            foreach ($community as &$post) {
                $getPostComment = $this->apiRequest(
                    'http://feapi.aethriasolutions.com/api/PostComment/v1/GetDetails/' . $post['code'],
                    $accessToken ?? null
                );
                $comments = $getPostComment->successful() ? $getPostComment->json('data') : [];

                // ✅ Latest comment top order By DESC Code (jugaar)
                usort($comments, function($a, $b) {
                    return strtotime($b['commented_DateTime']) - strtotime($a['commented_DateTime']);
                });
                $post['comments'] = $comments;
            }

            return view('websitePages.community', compact('username', 'community'));
        }
    }



    public function appBanner()
    {
        $accessToken = session('access_token');
        $profile= $this->getProfile();
        $username= $profile['username'];
        return view('websitePages.app-banner', compact('username'));
    }

    public function contact()
    {
        $profile = $this->getProfile();
        $username = $profile['username'];
        return view('websitePages.contact', compact('username'));
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
        if(session('access_token')){
            $profile= $this->getProfile();
            $username= $profile['username'];
            $validator= Validator::make($request->all(), [
                'comment' => 'required'
            ]);
            if($validator->fails()){
                return response()->json('error', $validator->errors());
            } else {
                try {
                    $response = Http::asForm()
                        ->withHeaders([
                            'Authorization' => 'Bearer '.session('access_token'),
                        ])
                        ->withOptions(['verify' => false])
                        ->post('http://feapi.aethriasolutions.com/api/PostComment/v1/Insert', [
                            'Comment' => $request['comment'],
                            'Commented_DateTime' => $request['dateTime'],
                            'FK_UserID' => $request['fK_UserID'],
                            'FK_Post_Code' => $request['FK_Post_Code'],
                            // 'Isdelete' => $request['is_delete'] ?? false,
                        ]);
                    $resultArray = $response->json();
                    $resultText = $resultArray['text'] ?? null;
                    return response()->json(['message' => $resultText, 'username' => $username], 200);
                } catch (Exception $exp) {
                    return response()->json(['error' => $exp->getMessage()], 500);
                }
            }
        } else {
            return response()->json(['error' => 'Please Login First'], 401);
        }
    }

    public function createPost(Request $request)
    {
        if(session('access_token')){
            $profile= $this->getProfile();
            $FK_UserID= $profile['FK_UserID'];
            $validator= Validator::make($request->all(), [
                'coverImageUpload' => 'required',
                'post_name' => 'required',
            ]);
            if($validator->fails()){
                return response()->json('error', $validator->errors());
            } else {
                try {
                $http = Http::withHeaders([
                                'Authorization' => 'Bearer ' . session('access_token'),
                            ])->withOptions(['verify' => false]);

                    if ($request->hasFile('image01')) {
                        $http = $http->attach(
                            'ImageFile1',
                            fopen($request->file('image01')->getRealPath(), 'r'),
                            $request->file('image01')->getClientOriginalName()
                        );
                    }

                    if ($request->hasFile('coverImageUpload')) {
                        $http = $http->attach(
                            'Cover_Image1',
                            fopen($request->file('coverImageUpload')->getRealPath(), 'r'),
                            $request->file('coverImageUpload')->getClientOriginalName()
                        );
                    }

                    $response = $http->post('http://feapi.aethriasolutions.com/api/v1/community/NewPost', [
                        'FK_UserID' => $FK_UserID,
                        'Post_English' => $request->post_name,
                        'Publish_DateTime' => Carbon::now(),
                        'Status' => 'Pending',
                        'Language' => 'si',
                    ]);

                    $resultArray = $response->json();
                    return response()->json(['message' => $resultArray['text'] ?? 'No response'], 200);

                } catch (Exception $exp) {
                    return response()->json(['error' => $exp->getMessage()], 500);
                }
            }
        } else {
            return response()->json(['error' => 'Please Login First'], 401);
        }
    }

    public function likePost(Request $request)
    {
        if(session('access_token')){
                try {
                    $profile= $this->getProfile();
                    $FK_UserID= $profile['FK_UserID'];
                    $params = [
                        'FK_UserID' => $FK_UserID,
                        'FK_Post_Code' => $request->FK_Post_Code,
                        'Isdelete' => $request->is_delete
                    ];

                    $response = Http::withHeaders([
                            'Authorization' => 'Bearer '.session('access_token'),
                        ])
                        ->withOptions(['verify' => false])
                        ->asJson()
                        ->post('http://feapi.aethriasolutions.com/api/Postlike/v1/Insert', $params);

                    $resultArray = $response->json();
                    dd($resultArray);

                    return response()->json(['message' => $resultArray['text'] ?? 'No response'], 200);

                } catch (Exception $exp) {
                    return response()->json(['error' => $exp->getMessage()], 500);
                }

        } else {
            return response()->json(['error' => 'Please Login First'], 401);
        }
    }

}
