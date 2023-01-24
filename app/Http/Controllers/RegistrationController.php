<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;

class RegistrationController extends Controller
{

    public function register(Request $request)
    {

        return view('common/register');
    }
    public function registration_process(Request $request)
    {

        $valid=Validator::make($request->all(),[
            'inputName'=>'required',
            'inputEmail'=>'required|email|unique:users,email',
            'inputMobile'=>'required|numeric|digits:11',
            'inputPassword'=>'required',
        ]);
        if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
        }else{

            $arr=[
                "name"=>$request->inputName,
                "email"=>$request->inputEmail,
                "mobile"=>$request->inputMobile,
                "password"=>Crypt::encrypt($request->inputPassword),
                "status"=>1,
                "created_at"=>date('y-m-d h:i:s'),
                "updated_at"=>date('y-m-d h:i:s')
            ];
                DB::table('users')->insert($arr);
              return response()->json(['status'=>'success','msg'=>"Registration Successfull."]);

        }
    }

}
