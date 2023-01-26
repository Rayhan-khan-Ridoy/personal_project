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
                "user_type"=>"user",
                "created_at"=>date('y-m-d h:i:s'),
                "updated_at"=>date('y-m-d h:i:s')
            ];
                DB::table('users')->insert($arr);
              return response()->json(['status'=>'success','msg'=>"Registration Successfull."]);

        }
    }


    public function login_process(Request $request){

        $result=DB::table('users')
            ->where(['email'=>$request->inputEmail])
            ->get();
        $user=$result[0]->user_type;
//        echo"<pre>";
//        print_r($user);
//        die();
        if(isset($result[0])){
            $db_pwd=Crypt::decrypt($result[0]->password);
            if($db_pwd==$request->inputPassword){
                $request->session()->put('USER_LOGIN',true);
//                $request->session()->put('FRONT_USER_ID',$result[0]->id);
//                $request->session()->put('FRONT_USER_NAME',$result[0]->name);
                $status="success";
                $msg="";
            }else{
                $status="error";
                $msg="please enter valid password";
            }

        }else{
            $status="error";
            $msg="please enter valid email id";
        }
        return response()->json(['status'=>$status,'msg'=>$msg, 'user_type'=>$user]);
    }
}

