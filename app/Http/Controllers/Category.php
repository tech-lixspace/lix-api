<?php

namespace App\Http\Controllers;

use App\Models\LixCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use  App\Helpers\Authentication\AuthenticationHelper;

class Category extends Controller
{

    public function __construct(){}

    public function list(Request $request, $page, $limit){
        $start = $limit * ($page - 1);
        $data = LixCategory::select('id', 'name')
                ->where('is_delete', '!=', 1);
        $total_data = $data->count();        
        $data = $data->skip($start)
                    ->take($limit)
                    ->get();
        if($data){
            if(sizeof($data) > 0){
                $number = ($page * $limit) - $limit;
                $number += 1;
                foreach($data as $d){
                    $d->number = $number;
                    $number += 1;
                }
                return response()->json([
                    'status' => true, 
                    'messsage' => 'Retrieve data success',
                    'data' => $data,
                    'total_data' => $total_data], 
                200);
            }else{
                return response()->json([
                    'status' => false, 
                    'messsage' => 'Data not found'], 
                404);
            }
        }else{
            return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
        }
    }

    public function detail(Request $request, $id){
        $data = LixCategory::select('id', 'name')
                ->where([
                    ['id', '=', $id],
                    ['is_delete', '!=', 1]
                ])
                ->get();
        if($data){
            if(sizeof($data) > 0){
                return response()->json([
                    'status' => true, 
                    'messsage' => 'Retrieve data success',
                    'data' => $data], 
                200);
            }else{
                return response()->json([
                    'status' => false, 
                    'messsage' => 'Data not found'], 
                404);
            }
        }else{
            return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
        }
    }

    public function create(Request $request){
        $data = new LixCategory;
        $data->name = $request->name;
        $data->is_delete = 0;

        $data = $data->save();

        if($data){
            return response()->json([
                'status' => true, 
                'messsage' => 'Insert success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
        }
    }

    public function update(Request $request, $id){
        $data = LixCategory::select('id', 'name')
                    ->where([
                        ['id', '=', $id],
                        ['is_delete', '!=', 1]
                    ])
                    ->first();

        if(!isset($data->id)){
            return response()->json([
                'status' => false, 
                'messsage' => 'Data not found'], 
            404);
        }

        $data->name = $request->name;

        $data = $data->save();

        if($data){
            return response()->json([
                'status' => true, 
                'messsage' => 'Update success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
        }
    }

    public function delete(Request $request, $id){
        $data = LixCategory::select('id', 'name')
                    ->where([
                        ['id', '=', $id],
                        ['is_delete', '!=', 1]
                    ])
                    ->first();

        if(!isset($data->id)){
            return response()->json([
                'status' => false, 
                'messsage' => 'Data not found'], 
            404);
        }

        $data->is_delete = 1;

        $data = $data->save();

        if($data){
            return response()->json([
                'status' => true, 
                'messsage' => 'Delete success'], 
            201);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
        }
    }
}
