<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



use  App\Helpers\Authentication\AuthenticationHelper;

class Authentication extends Controller
{

    public function __construct(){}

    public function login(Request $request, AuthenticationHelper $auth){
        $users = DB::table('lix_user AS a')
                ->select('a.*')
                ->join('lix_credential AS b', 'a.id', '=', 'b.id_user')
                ->where([
                    ['a.username', '=', $request->username],
                    ['b.general_pass', '=', $request->password]
                ])
                ->get();
        if(sizeof($users) > 0){
            return response()->json([
                'status' => true, 
                'messsage' => 'Login success', 
                'access_token' => $auth->generate_access_token($users[0]->id), 
                'data' => $users[0]], 
            200);
        }else{
            return response()->json(['status' => false, 'messsage' => 'Anuthorized'], 401);
        }
    }
}