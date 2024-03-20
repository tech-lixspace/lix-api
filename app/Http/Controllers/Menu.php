<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use  App\Helpers\Authentication\AuthenticationHelper;

class Menu extends Controller
{

    public function __construct(){}

    public function list(Request $request, $page, $limit, $test){
        $token = $request->bearerToken();
        $start = $limit * ($page - 1);
        $menu = DB::table('lix_menu')
                ->select('id', 'name', 'description', 'price')
                ->where([
                    ['is_delete', '!=', 1]
                ]);
        
        $total_data = $menu->count();        
        $data = $menu->skip($start)
                    ->take($limit)
                    ->get();
        
        if($data){
            $number = ($page * $limit) - $limit;
            $number += 1;
            foreach($data as $d){
                $d->number = $number;
                $number += 1;
            }
            return response()->json([
                'status' => true, 
                'messsage' => 'Retrieve data success',
                'data' => $test,
                'total_data' => $total_data], 
            200);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }

    public function detail(Request $request, $id_menu){
        $menu = DB::table('lix_menu')
                ->select('id', 'name', 'description', 'price')
                ->where([
                    ['id', '=', $id_menu]
                ])
                ->get();
        if($menu){
            return response()->json([
                'status' => true, 
                'messsage' => 'Retrieve data success',
                'data' => $menu], 
            200);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }

    public function create(Request $request){
        $menu = DB::table('lix_menu')->insert([
            'name' => $request->name, 
            'description' => $request->description,
            'price' => $request->price,
            'is_delete' => 0
        ]);
        if($menu){
            return response()->json([
                'status' => true, 
                'messsage' => 'Insert success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }

    public function update(Request $request, $id_menu){
        $menu = DB::table('lix_menu')
                    ->where('id', $id_menu)
                    ->update([
                        'name' => $request->name, 
                        'description' => $request->description,
                        'price' => $request->price,
                        'timemodified' => date('Y-m-d H:i:s')
                    ]);
        if($menu){
            return response()->json([
                'status' => true, 
                'messsage' => 'Update success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }

    public function delete(Request $request, $id_menu){
        $menu = DB::table('lix_menu')
                    ->where('id', $id_menu)
                    ->update([
                        'is_delete' => 1
                    ]);
        if($menu){
            return response()->json([
                'status' => true, 
                'messsage' => 'Delete success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }
}
