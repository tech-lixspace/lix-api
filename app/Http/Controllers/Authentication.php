<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\LixCredential;
use App\Models\LixUser;
use App\Models\LixToken;

use  App\Helpers\Authentication\AuthenticationHelper;

class Authentication extends Controller
{

    public function __construct(){}

    public function login(Request $request, AuthenticationHelper $auth){

        $dataUser = LixUser::firstWhere('username', $request->username);
        
        if(!$dataUser){
            return response()->json([
                'status' => false, 
                'messsage' => 'Username not found'], 
            404);
        }

        $getPass = LixCredential::where('id_user', '=', $dataUser->id)->first();
        if(password_verify($request->password, $getPass->general_pass)){
            $dataToken = new \stdClass();
            $dataToken->id_user = $dataUser->id;
            $dataToken->role = $dataUser->role;
            $token = $auth->generate_access_token($dataToken);

            $dataToken = LixToken::firstWhere('id_user', $dataUser->id);
        
            if(!$dataToken){
                $dataSaveToken = new LixToken;
                $dataSaveToken->id_user = $dataUser->id;
                $dataSaveToken->access_token = $token;
                $dataSaveToken->refresh_token = '';

                $saveToken = $dataSaveToken->save();

                if(!$saveToken){
                    return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
                }
            }else{
                $dataToken->id_user = $dataUser->id;
                $dataToken->access_token = $token;
                $dataToken->refresh_token = '';

                $saveToken = $dataToken->save();

                if(!$saveToken){
                    return response()->json(['status' => false, 'messsage' => 'Trouble'], 400);
                }
            }

            return response()->json([
                'status' => true, 
                'messsage' => 'Login success', 
                'access_token' => $token, 
                'data' => $dataUser], 
            200);
        }else{
            return response()->json([
                'status' => false, 
                'messsage' => 'Incorrect password'], 
            401);
        }
    }
}
