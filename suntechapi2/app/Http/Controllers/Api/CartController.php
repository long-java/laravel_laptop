<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartService;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;






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

    //API
    public function index(Request $request)
    {
        try{
            $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan 
            $orderBys = [];
            if($request->get('column') && $request->get('sort')){
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }

            $cartPaginate = $this -> cartService -> getAll($orderBys,$limit);
            $cartArr = $cartPaginate -> items();

            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'cartArr'  => $cartArr,  //=> 1 items
            ]);
        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
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
        try{
            $cart = $this -> cartService -> save(['product_id' => $id,
                                                'quantity' => '1',

                                                ]);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'cart' => $cart
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
                'error' => 'store error'
            ]);
        }
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
