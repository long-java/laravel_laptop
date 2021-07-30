<?php

namespace App\Services;

use App\Models\Exam;

class ExamService {

    //show data 
    public function getAll($orderBys = [],  $limit = 2) {
        $query = Exam::query();
        if($orderBys){
            $query->orderBy($orderBys['column'], $orderBys['sort']);
        }
        return $query-> paginate($limit);
    }

    //Save data 
    public function save(array $data, int $id = null){
        return Exam::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $data['name']
            ]
        );
    }

    public function findById($id){
        return Exam::find($id);
    }

    public function delete($ids = []){ 
        return Exam::destroy($ids);
    }

    public function findByName($name){
        return Exam::where('name',$name)->get();
    }
}