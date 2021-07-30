<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private  $orderService;

    public function __construct(OrderService $orderService){
        $this -> orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $limit = $request -> get('limit') ?? config('app.paginate.per_page'); 
            $orderBys = [];
            if($request->get('column') && $request->get('sort')){
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }

            $ordersPaginate = $this -> orderService -> getAll($orderBys,$limit);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'orders'  => $ordersPaginate -> items(),
                'paginate' => $ordersPaginate,
                'meta'   => [
                    'total' => $ordersPaginate -> total(),
                    'perPage' => $ordersPaginate -> perPage(),
                    'currentPage' => $ordersPaginate -> currentPage()
                ]
            ]);

            // return $ordersPaginate -> items();
            // $orders = $ordersPaginate -> items();
            // return view('admin.order.index', compact('orders'));

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

        $order = $this -> orderService -> findById($id);

        $order_items = $order -> order_items;

        $sumMoney = 0;

        foreach($order_items as $key => $item){   
            $f1 =  ($item -> products() -> first() -> price) * ($item -> quantity);
            $sumMoney += $f1;
        }

        //status progess
        $status_id = $order -> status_id;
        $status = 25;
        if($status_id == 2){
            $status = 50;
        }elseif($status_id == 3){
            $status = 75;
        }elseif($status_id == 4){
            $status = 100;
        }

        return response() -> json([
            'status' => true,
            'code'   => Response::HTTP_OK,
            'order'  => $order,
            'order_items'  => $order_items,
            'sumMoney'  => $sumMoney,
            'status' => $status

        ]);


        // return view('admin.order.edit', compact('order', 'order_items', 'sumMoney','status'));
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

        $order = $this-> orderService -> findById($id);
        $status = $order -> status_id;
        $status_edit = 1;
        
        if($status == 4){
            $status_edit = 1;
        }else{
            $status_edit = $status + 1;
        }

        try{
            $exam = $this -> orderService -> save(['status_id' => $status_edit], $id);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'order' => $order
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
