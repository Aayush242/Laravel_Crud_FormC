<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Laravel\Passport\Passport;

class ApiLoginController extends Controller
{
     /**
     * handle user registration request
     */
    public function registerUserExample(Request $request){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'password'=>'required',
        // ]);
        $user= User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        // $access_token_example = $user->createToken('NewTokenRegister')->access_token;
        //return the access token we generated in the above step
        $response =['user_Data' => $user];
        return response($response, 200);
    }

    /**
     * login user to our application
     */
    public function loginUserExample(Request $request){
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user_login_token= auth()->user()->createToken('NewTokenLogin')->accessToken;

            //now return this token on success login attempt
            return response()->json(['token' => $user_login_token], 200);
        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    /**
     * This method returns authenticated user details
     */
    public function authenticatedUserDetails(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been Logout'];
        return response($response, 200);
    }
}

