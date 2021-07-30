<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Exam;

class ProductService {
    //show data 
    public function getAll($orderBys = [],  $limit = 2) {
        $query = Product::query();
        if($orderBys){
            $query->orderBy($orderBys['column'], $orderBys['sort']);
        }
        return $query-> paginate($limit);
    }

    //Save data 
    public function save(array $data, int $id = null){
        $categoryName = $data['categoryName'];
        // dd($categoryName);
        $category_id = Exam::where('name',$categoryName)->first()->id;
        return Product::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'images' => $data['images'],
                'category_id' => $category_id
            ]
        );
    }

    public function delete($ids = []){ 
        return Product::destroy($ids);
    }

    public function findById($id){
        return Product::find($id);
    }


}