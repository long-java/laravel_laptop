<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\SessionModel;


class CartService {

    public function getAll($orderBys = [],  $limit = 2) {
        // $idCurrent = session('idUser') ;  //=> null
        $idCurrent = Auth::id();  //=> null

        // $idCurrent = Session::get('idUser')  ?? -1;  

        // $idCurrent = $request->session()->get('idUser') ;

        // dd($idCurrent);
        
        $query = Cart::query()  -> where('user_id',$idCurrent);
        if($orderBys){
            $query->orderBy($orderBys['column'], $orderBys['sort']);
        }
        return $query-> paginate($limit);
    }


    public function save(array $data, int $id = null){
        $idCurrent = Auth::user();       
        return Cart::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'user_id' => $idCurrent,
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity']
            ]
        );
    }


}