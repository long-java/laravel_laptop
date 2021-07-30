<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;




class CartController extends Controller
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

     //Call API
    // public function index(Request $request)
    // {
    
    //     $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan 
    //     $column = $request->get('column') ?? '';
    //     $sort = $request->get('sort') ?? 'asc';

    //     $cartPaginate = Http::get("http://127.0.0.1:8000/api/cart?limit=$limit&column=$column&sort=$sort");

    //     $cartPaginate =  json_decode($cartPaginate, true);
    //     dd($cartPaginate);


    //     $cartArr = $cartPaginate['cartArr'];


    //     //convert 
    //     $cart = array();
    //     for($i = 0; $i < count($cartArr); $i++)
    //     {
    //         $object = new Cart();
    //         foreach ($cartArr[$i] as $key => $value)
    //         {
    //             $object->$key = $value;
    //         }
    //         array_push($cart,$object);  
    //     } 
    //     session(['cart' => $cart ]);
    //     return view('guest.cart.index', compact('cart'));
    // }

    ///////////////////////////////////////////////////////
//Call API
public function index(Request $request)
{

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


    return view('guest.cart.index', compact('cart'));

}







    ///////////////////////////////////////////////////////


    public function cartHover($id){
        $product = Http::get("http://127.0.0.1:8000/api/products/show/$id");
        $productArr =  json_decode($product) -> item;

        //convert
        $product = new Product();
        foreach ($productArr as $key => $value)
        {
            $product->$key = $value;
        }
        // dd($object -> exams() -> first() -> name);

        $product_images = $product -> images;
        $images = explode(";", $product_images);
        
        return view('guest.components.cart_hover.index', compact('product','images'));
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
    public function store($id)
    {
        // $store = Http::post("http://127.0.0.1:8000/api/store/$id",[
        //                                                         // 'product_id' => $id,
        //                                                         // 'quantity' => '1',

        // ]);
        $cart = $this -> cartService -> save(['product_id' => $id,
                                                'quantity' => '1',

                                                ]);

        return redirect('/products');
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
