<?php

namespace App\Http\Controllers;
use App\Models\Authenticates;
use App\Models\CUser;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use DateTime;

class LoginApiController extends Controller
{
    //


 //register auth
 public function Register (Request $req){

    $var = new Authenticates();
    
    $var ->name= $req->name;
    $var->email=$req->email;
    $var ->password= Hash::make($req->password);
   $var->save();
return response()->json([
            'var'=>  $var,
        ],200)
        
        ; 
}
//login 
public function Login (Request $req){

    
   try{
   $email= $req->email;
   $password=$req->password;
   //$user = CUser::where('email',$email)->first();
   $user = CUser::where('email',$req->email)->where('password',$req->password)->first();
    
    if($user){
        //if(Hash::check($req->password, $user->password))
        //'::make($req['password']))
        //if(Hash::check($req('password'), $user->password))
      //{ 
         $api_token = Str::random(64);
        $token = new Token();
        $token->userid = $user->id;
        $token->token = $api_token;
        $token->created_at = new DateTime();    
        $token->save();
      
        return response()->json([
            'message' => 'User login successfully',
            'authtoken'=>$token,
            
        ],200
    
    );
//}
        
    }
   }
catch(\Exception $exception){

       return response([
            'message'=>$exception->getMessage()
        ],400);
        }      
  return response([
        'message'=>"Login Failed"
    ],401);   
}

//logout from database by update creating updating
public function Logout (Request $request ){
    try{
          $token = Token::where('token', $request->header('token'))->first();
          
          $token->expired_at =  new DateTime();
    
      if($token->save()){
        return response()->json(
            [
                'message'=>'logout successfully',
            ],
            200
        );           
      }
    }
    catch (\Exception $exception){
           return response([
            'message'=>$exception->getMessage()
        ],400);
        
    }
  
}


}
