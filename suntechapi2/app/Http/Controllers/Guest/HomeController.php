<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
use App\Models\Cart;
use App\Services\CartService;



require_once "../vendor/autoload.php";


class HomeController extends Controller
{

    private  $cartService;

    public function __construct(CartService $cartService){
        $this -> cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan tu khai bao trong config
        // $orderBys = [];
        // if($request->get('column') && $request->get('sort')){
        //     $orderBys['column'] = $request->get('column');
        //     $orderBys['sort'] = $request->get('sort');
        // }

        $productsPaginate = Http::get("http://127.0.0.1:8000/api/products?limit=$limit");
        $productsPaginate =  json_decode($productsPaginate);
        $products = $productsPaginate -> exams;

        // $cartPaginate = Http::get("http://127.0.0.1:8000/api/cart");
        // $cartPaginate =  json_decode($cartPaginate, true);
        // $cartArr = $cartPaginate['cartArr'];
        // //convert 
        // $cart = array();
        // for($i = 0; $i < count($cartArr); $i++)
        // {
        //     $object = new Cart();
        //     foreach ($cartArr[$i] as $key => $value)
        //     {
        //         $object->$key = $value;
        //     }
        //     array_push($cart,$object);  
        // } 
        // session(['cart' => $cart ]);

        $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan 
        $orderBys = [];
        if($request->get('column') && $request->get('sort')){
            $orderBys['column'] = $request->get('column');
            $orderBys['sort'] = $request->get('sort');
        }
    
        $cartPaginate = $this -> cartService -> getAll($orderBys,$limit);
        $cartArr = $cartPaginate -> items();
     
        $cart = $cartArr;        
        
        session(['cart' => $cart ]);

        
        return view('guest.home.index', compact('products'));


    }

    //////////////////////////////

    public function detailproduct($id)
    {
        $product = Http::get("http://127.0.0.1:8000/api/products/show/$id");
        $product =  json_decode($product) -> item;

        
        $product_images = $product -> images;
        $images = explode(";", $product_images);
        
        return view('guest.home.detailproduct', compact('product','images'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
