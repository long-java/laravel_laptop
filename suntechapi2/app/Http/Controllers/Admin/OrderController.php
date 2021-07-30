<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Client
    public function index(Request $request)
    {
        try{
            $limit = $request -> get('limit') ?? config('app.paginate.per_page'); 
            $column = $request->get('column') ?? '';
            $sort = $request->get('sort') ?? 'asc';

            $ordersPaginate = Http::get("http://127.0.0.1:8000/api/orders?limit=$limit&column=$column&sort=$sort");
            $ordersPaginate = json_decode($ordersPaginate, true);  //-> array
                        
            //convert the received array to an order object
            $orderArray = $ordersPaginate['orders'];
            $orders = array();
            for($i = 0; $i < count($orderArray); $i++)
            {
                $object = new Order();
                foreach ($orderArray[$i] as $key => $value)
                {
                    $object->$key = $value;
                }
                array_push($orders,$object);  
            }   
            // dd($arr);

            // foreach($ordersPaginate->orders as $key => $paginate)
            // {
            //     $order = new Order(['id' => $paginate -> id,
            //                         'user_id' => $paginate -> user_id,
            //                         'shipping_fee' => $paginate -> shipping_fee,
            //                         'total' => $paginate -> total,
            //                         'payment' => $paginate -> payment,
            //                         'status_id' => $paginate -> status_id,
            //                         'created_at' => $paginate -> created_at,
            //                         'updated_at' => $paginate -> updated_at,
            
            //     ]);
            //     $arr[$i] = $order;
            //     $i = $i + 1;
            // }
            return view('admin.order.index', compact('orders'));

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

        $rs = Http::get("http://127.0.0.1:8000/api/orders/edit/$id");
        $rs = json_decode($rs, false);

        $orderArr = $rs -> order;
        $order_itemsArr = $rs -> order_items;
        $sumMoney = $rs -> sumMoney;
        $status = $rs -> status;

        //convert order
        $order = new Order();
        foreach ($orderArr as $key => $value)
        {
            $order->$key = $value;
        }

        //convert order_items
        $order_items = array();
        for($i = 0; $i < count($order_itemsArr); $i++)
        {
            $object = new OrderItem();
            foreach ($order_itemsArr[$i] as $key => $value)
            {
                $object->$key = $value;
            }
            array_push($order_items,$object);  
        }  
        // dd($order_items);
        return view('admin.order.edit', compact('order', 'order_items', 'sumMoney','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $rs = Http::put("http://127.0.0.1:8000/api/orders/update/$id");

        $rs = json_decode($rs);
        // dd($rs);
        return redirect('/orders');


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
