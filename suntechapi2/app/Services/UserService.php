<?php
namespace App\Services;

use App\Models\User;

class UserService {

    //Save data 
    public function save(array $data, int $id = null){
        // return User::updateOrCreate(
        //     [
        //         'id' => $id
        //     ],
        //     [
        //         'name' => $data['name']
        //     ],
        //     [
        //         'email' => $data['email']
        //     ],
        //     [
        //         'password' => $data['password']
        //     ]


        // );
        return User::create($data);

    }



}







?>