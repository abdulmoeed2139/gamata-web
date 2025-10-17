<?php
// $phone = '0777397860';
namespace App\Http\Controllers;

use \Exception;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FrontentController extends Controller
{

    public function getProfile()
    {
        try {
            $accessToken = session('access_token');
            $userName ="";
            if ($accessToken) {
                $phone = '0'.session('phone_number');
                $profileResponse = Http::withToken($accessToken)
                    ->acceptJson()
                    ->get("https://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en");
                $profile = $profileResponse->json('data') ?? [];
                // dd([
                //     $profileResponse,
                //     session('phone_number'),
                //     $phone,
                //     session('access_token'),
                //     "http://feapi.aethriasolutions.com/api/v1/Account/user?Mobile={$phone}&Lan=en"
                //     ]);
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

            $getBlogs = $this->apiRequest(
                'http://feapi.aethriasolutions.com/api/Blog/v1/GetAllWithOutPagination',
                $this->token ?? null
            );

            // dd([
            //     'bestSelling' => $getBestSellingProduct->successful(),
            //     'network' => $getExploreNetwork->successful(),
            //     'stats' => $getCommunityStats->successful(),
            //     'team' => $getExploreTeam->successful(),
            //     'blogs' => $getBlogs->successful(),
            // ]);

            $bestSellingItems = $getBestSellingProduct->json('data') ?? [];
            $exploreNetwork = $getExploreNetwork->json('result') ?? [];
            $exploreTeam = $getExploreTeam->json('result') ?? [];
            $exploreTeamText = $getExploreTeam->json('text') ?? [];
            $result = $getCommunityStats->json('result') ?? [];
            $communityText = $getCommunityStats->json('text') ?? [];
            $blogs = $getBlogs->json('data') ?? [];

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
                'blogs',
            ));

        } catch (\Exception $e) {
            return view('websitePages.index', [
                'bestSellingItems' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }


    public function verifyOTP()
    {
        if(session('access_token')){
            return redirect()->route('index', app()->getLocale());
        } else {
            return view('auth.verify-otp');
        }
    }

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

    public function getSingleBlog($id)
    {
        try {
            $accessToken = session('access_token');
            $getBlog = $this->apiRequest(
                'http://feapi.aethriasolutions.com/api/Blog/v1/GetById/'.$id,
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

    // public function product()
    // {
    //     $profile = $this->getProfile();
    //     $username = $profile['username'];
    //     $page = request('page', 1);
    //     $itemsPerPage = 9; // per page items
    //     $getAllProduct = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/Product/GetAll?items_per_page='.$itemsPerPage.'&page='.$page.'&Lan=En',
    //         $this->token ?? null
    //     );
    //     $responseData = $getAllProduct->json();
    //     $paginatedProducts = $responseData['data'] ?? [];
    //     $pagination = $responseData['payload']['pagination'] ?? [];
    //     $ctg = $responseData['payload']['categories'] ?? [];
    //     $sellers = $responseData['payload']['sellers'] ?? [];
    //     $fresh_products = $responseData['payload']['fresh_products'] ?? [];
    //     $districts = $responseData['payload']['districts'] ?? [];

    //     return view('websitePages.product', compact(
    //         'paginatedProducts',
    //         'pagination',
    //         'ctg',
    //         'sellers',
    //         'fresh_products',
    //         'districts',
    //         'username',
    //     ));
    // }

    // public function product(Request $request)
    // {
    //     $profile = $this->getProfile();
    //     $username = $profile['username'];

    //     $page = $request->get('page', 1);
    //     $itemsPerPage = $request->get('items_per_page', 9);
    //     $childCode = $request->get('childCode');

    //     // Get All Product Api
    //     $apiUrl = "http://feapi.aethriasolutions.com/api/v1/Product/GetAll?items_per_page=100&page=1&Lan=En";
    //     $getAllProduct = $this->apiRequest($apiUrl, $this->token ?? null);
    //     $responseData = $getAllProduct->json();

    //     // Filter Sidebar Attributes
    //     $ctg = $responseData['categories'] ?? [];
    //     $sellers = $responseData['sellers'] ?? [];
    //     $fresh_products = $responseData['fresh_products'] ?? [];
    //     $districts = $responseData['districts'] ?? [];
    //         $allProducts = $responseData['data'] ?? [];
    //         $collection = collect($allProducts);
    //         $paginatedProducts = new LengthAwarePaginator(
    //             $collection->forPage($page, $itemsPerPage),
    //             $collection->count(),
    //             $itemsPerPage,
    //             $page,
    //             ['path' => url()->current(), 'query' => $request->query()]
    //         );

    //         $from = ($paginatedProducts->currentPage() - 1) * $paginatedProducts->perPage() + 1;
    //         $to = $from + $paginatedProducts->count() - 1;
    //         $total = $paginatedProducts->total();
    //         $pagination['from'] = $from;
    //         $pagination['to'] = $to;
    //         $pagination['total'] = $total;

    //         $pagination = [
    //             'page' => $page,
    //             'items_per_page' => $itemsPerPage,
    //             'total' => $collection->count(),
    //             'last_page' => ceil($collection->count() / $itemsPerPage),
    //             'from' => $from,
    //             'to' => $to,
    //         ];

    //     return view('websitePages.product', compact(
    //         'paginatedProducts',
    //         'pagination',
    //         'username',
    //         'ctg',
    //         'sellers',
    //         'fresh_products',
    //         'districts',
    //     ));
    // }

    public function product(Request $request)
    {
        $profile = $this->getProfile();
        $username = $profile['username'];

        $search = $request->get('search');
        $page = $request->get('page', 1);
        $itemsPerPage = $request->get('items_per_page', 9);
        $childCode = $request->get('childCode');

        // Fetch All Product Api
        $apiUrl = "http://feapi.aethriasolutions.com/api/v1/Product/GetAll?items_per_page=100&page=1&Lan=En&search=".$search;
        $getAllProduct = $this->apiRequest($apiUrl, $this->token ?? null);
        $responseData = $getAllProduct->json();

        // Fetch all related products from API
        $apiUrl2 = "http://feapi.aethriasolutions.com/api/v1/Sell/GetAllSellsByProduct/?items_per_page=100&page=1&Lan=si&productId=".$childCode;
        $getRelatedProduct = $this->apiRequest($apiUrl2, $this->token ?? null);
        $responseData2 = $getRelatedProduct->json();

        // Filter Sidebar Attributes
        $ctg = $responseData['categories'] ?? [];
        $fresh_products = $responseData['fresh_products'] ?? [];
        $sellers = $responseData['top_Sellers'] ?? [];
        $districts = $responseData['districts'] ?? [];

        if(isset($childCode)){

            $productArray = $getRelatedProduct->json()['data'] ?? [];
            $collection = collect($productArray);

            // Paginate manually
            $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
                $collection->forPage($page, $itemsPerPage),
                $collection->count(),
                $itemsPerPage,
                $page,
                ['path' => url()->current()]
            );

            $from = ($paginatedProducts->currentPage() - 1) * $paginatedProducts->perPage() + 1;
            $to = $from + $paginatedProducts->count() - 1;
            $total = $paginatedProducts->total();
            $pagination['from'] = $from;
            $pagination['to'] = $to;
            $pagination['total'] = $total;

            $pagination = [
                'page' => $page,
                'items_per_page' => $itemsPerPage,
                'total' => $collection->count(),
                'last_page' => ceil($collection->count() / $itemsPerPage),
                'from' => $from,
                'to' => $to,
            ];

        } else {

            $allProducts = $responseData['data'] ?? [];
            $collection = collect($allProducts);
            $paginatedProducts = new LengthAwarePaginator(
                $collection->forPage($page, $itemsPerPage),
                $collection->count(),
                $itemsPerPage,
                $page,
                ['path' => url()->current(), 'query' => $request->query()]
            );

            $from = ($paginatedProducts->currentPage() - 1) * $paginatedProducts->perPage() + 1;
            $to = $from + $paginatedProducts->count() - 1;
            $total = $paginatedProducts->total();
            $pagination['from'] = $from;
            $pagination['to'] = $to;
            $pagination['total'] = $total;

            $pagination = [
                'page' => $page,
                'items_per_page' => $itemsPerPage,
                'total' => $collection->count(),
                'last_page' => ceil($collection->count() / $itemsPerPage),
                'from' => $from,
                'to' => $to,
            ];
        }

        return view('websitePages.product', compact(
            'paginatedProducts',
            'pagination',
            'username',
            'ctg',
            'sellers',
            'fresh_products',
            'districts',
        ));
    }


    public function producttInner($lang, $sellcode)
    {
        $accessToken = session('access_token');
        $profile= $this->getProfile();
        $username= $profile['username'];
        $getProduct = $this->apiRequest(
            'http://feapi.aethriasolutions.com/api/v1/Product/ViewMore/6?mobile=0776563157&lan=En&parent='.$sellcode,
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
            return view('websitePages.productt-inner', compact('username', 'product', 'bestSellingItems'));
        }
    }

    public function relatedProducts($childCode, Request $request)
    {
        $page = (int) $request->get('page', 1);
        $itemsPerPage = (int) $request->get('items_per_page', 9);

        // Fetch all related products from API (no pagination needed there)
        $getRelatedProduct = $this->apiRequest(
            "http://feapi.aethriasolutions.com/api/v1/Sell/GetAllSellsByProduct/?items_per_page=100&page=1&Lan=si&productId=".$childCode,
            $this->token ?? null
        );

        if ($getRelatedProduct->successful()) {
            $productArray = $getRelatedProduct->json()['data'] ?? [];
            $collection = collect($productArray);

            if ($collection->isEmpty()) {
                return response()->json(['related_products' => [], 'pagination' => []]);
            }

            // Paginate manually
            $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
                $collection->forPage($page, $itemsPerPage),
                $collection->count(),
                $itemsPerPage,
                $page,
                ['path' => url()->current()]
            );

            return response()->json([
                'related_products' => array_values($paginatedProducts->items()),
                'pagination_products' => $paginatedProducts,
                'pagination' => [
                    'current_page' => $paginatedProducts->currentPage(),
                    'last_page' => $paginatedProducts->lastPage(),
                    'total' => $paginatedProducts->total(),
                    'per_page' => $paginatedProducts->perPage(),
                    'from' => $paginatedProducts->firstItem(),
                    'to' => $paginatedProducts->lastItem(),
                ]
            ]);
        }

        return response()->json(['related_products' => [], 'pagination' => []]);
    }

    // public function community()
    // {
    //     $accessToken = session('access_token');
    //     $profile = $this->getProfile();
    //     $username = $profile['username'];
    //     $getCommunity = $this->apiRequest(
    //         'http://feapi.aethriasolutions.com/api/v1/community/Post?items_per_page=12&sort=id&order=desc&postType=Pending&page=1',
    //         $this->token ?? null
    //     );

    //     if ($getCommunity->successful()) {
    //         $community = $getCommunity->json('data') ?? [];
    //         foreach ($community as &$post) {
    //             $getPostComment = $this->apiRequest(
    //                 'http://feapi.aethriasolutions.com/api/PostComment/v1/GetDetails/' . $post['code'],
    //                 $accessToken ?? null
    //             );
    //             $comments = $getPostComment->successful() ? $getPostComment->json('data') : [];

    //             // ✅ Latest comment top order By DESC Code (jugaar)
    //             usort($comments, function($a, $b) {
    //                 return strtotime($b['commented_DateTime']) - strtotime($a['commented_DateTime']);
    //             });
    //             $post['comments'] = $comments;
    //         }

    //         return view('websitePages.community', compact('username', 'community'));
    //     }
    // }

    public function community()
    {
        $accessToken = session('access_token');
        $profile = $this->getProfile();
        $username = $profile['username'];

        $page = request()->get('page', 1);
        $itemsPerPage = 12; // API ka default

        $getCommunity = $this->apiRequest(
            "http://feapi.aethriasolutions.com/api/v1/community/Post?items_per_page={$itemsPerPage}&sort=id&order=desc&postType=Pending&page={$page}",
            $this->token ?? null
        );


        if ($getCommunity->successful()) {
            $responseData = $getCommunity->json();
            $community = $responseData['data'] ?? [];
            $pagination = $responseData['payload']['pagination'] ?? [];
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

            return view('websitePages.community', compact('username', 'community', 'pagination'));
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

            $response = Http::asForm()->withOptions([
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
            $validator = Validator::make($request->all(), [
                'coverUpload' => 'required|mimes:png,jpg,jpeg',
                'image01'          => 'nullable|mimes:png,jpg,jpeg',
                'post_name'        => 'required',
            ]);
            if($validator->fails()){
                return response()->json(['error' => $validator->errors()]);
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
                    ->asForm()
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
