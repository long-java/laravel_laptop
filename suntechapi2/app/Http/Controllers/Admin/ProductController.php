<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Exam;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request -> get('limit') ?? config('app.paginate.per_page');  //constan tu khai bao trong config

        $column = $request->get('column') ?? '';
        $sort = $request->get('sort') ?? 'asc';

        $productsPaginate = Http::get("http://127.0.0.1:8000/api/products?limit=$limit&column=$column&sort=$sort");
        $productsPaginate =  json_decode($productsPaginate);

        $products = $productsPaginate -> exams;

        return view('admin.product.index', compact('products'));
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

        $validator = Validator::make($request -> all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required',
            'categoryName' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect() -> back()->withInput()->withErrors(['Field required']);
        }

        $store = Http::post("http://127.0.0.1:8000/api/products/store",[
                                                                'name' => $request->name,
                                                                'description' => $request->description,
                                                                'price' => $request->price,
                                                                'images' => $request->images,
                                                                'categoryName' => $request->categoryName,
        ]);

        // $store =  json_decode($store);
        // dd($store);

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
        $product = Http::get("http://127.0.0.1:8000/api/products/show/$id",[
            // 'id' => $id,
        ]);

        $product = json_decode($product) -> item;
        // dd();
        return view('admin.product.index', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = $this -> productService -> findById($id);
        $product = Http::get("http://127.0.0.1:8000/api/products/show/$id");
        $product = json_decode($product) -> item;

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
        $validator = Validator::make($request -> all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required',
            'categoryName' => 'required'
        ]);

        
        if ($validator->fails()) {
            return redirect() -> back()->withInput()->withErrors(['Field required']);
        }
        
        // dd($request -> categoryName);

        $update = Http::put("http://127.0.0.1:8000/api/products/update/$id",[
                                                                            'name' => $request->name,
                                                                            'description' => $request->description,
                                                                            'price' => $request->price,
                                                                            'images' => $request->images,
                                                                            'categoryName' => $request->categoryName,
        ]);

        // $update =  json_decode($update);
        // dd($update);

        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Http::post("http://127.0.0.1:8000/api/products/destroy/$id");

        // $destroy  = json_decode($destroy);
        // dd($destroy);

        return redirect('/products');
    }

}
