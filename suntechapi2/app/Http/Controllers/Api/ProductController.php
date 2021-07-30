<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Exam;

class ProductController extends Controller
{

    private  $productService;

    public function __construct(ProductService $productService){
        $this -> productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan tu khai bao trong config
            $orderBys = [];
            if($request->get('column') && $request->get('sort')){
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }

            $productsPaginate = $this -> productService -> getAll($orderBys,$limit);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'exams'  => $productsPaginate -> items(),
                'meta'   => [
                    'total' => $productsPaginate -> total(),
                    'perPage' => $productsPaginate -> perPage(),
                    'currentPage' => $productsPaginate -> currentPage()
                ]
            ]);

            // $products = $productsPaginate -> items();
            // return view('admin.product.index', compact('products'));

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
        $categories = Exam::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $validator = Validator::make($request -> all(), [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'images' => 'required',
        //     'categoryName' => 'required'
        // ]);

        try{
            $product = $this -> productService -> save(['name' => $request->name,
                                                        'description' => $request->description,
                                                        'price' => $request->price,
                                                        'images' => $request->images,
                                                        'categoryName' => $request->categoryName,

                                                        ]);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'exam' => $product
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
        $product = $this -> productService -> findById($id);
        return response() -> json([
            'status' => true,
            'code'   => Response::HTTP_OK,
            'item' => $product
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this -> productService -> findById($id);
        $categories = Exam::all();
        return view('admin.product.edit', compact('product', 'categories'));
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
        // dd($request -> all());
        
        try{
            $product = $this -> productService -> save(['name' => $request->name,
                                                        'description' => $request->description,
                                                        'price' => $request->price,
                                                        'images' => $request->images,
                                                        'categoryName' => $request->categoryName, 
                                                        ], $id);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'product' => $product
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
        try{
            $this -> productService -> delete($id);
            return response() -> json([
                'status' => true,
                'code'   => Response::HTTP_OK
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
