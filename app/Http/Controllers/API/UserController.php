<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public $successStatus = 200;
    
    // 登录
    public function login()
    {
        if(empty(request('email')) || empty(request('password'))) {
            $this->set_error('帐号或密码不能为空!');
        }else if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $this->set_data('token', Auth::user()->createToken('MyApp')->accessToken);
            $this->set_success('登录成功!');
        }else {
            $this->set_error('帐号或密码错误!');
        }
        return response($this->get_result());
    }

    // 注册
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
