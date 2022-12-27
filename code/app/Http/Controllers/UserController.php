<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use DB;

class UserController extends Controller
{
    //
    protected $table= 'admin';
    public $data = [];
    public function user() {
        
        $title = 'Đăng Nhập Trang Quản Trị GGame';
        
        // dd($recruit);

        return view('user.index' ,$this->data, compact('title'));
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }
    public function login(UserRequest $request) {
        
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table($this->table)->Where('username', $username)->Where('password', $password)->first();
        if($result) {
            $request->session()->put('username', $result->username);
            $request->session()->put('id', $result->id);

            return redirect()->route('admin')->with('username',$request->username);
        } else {
            return redirect()->route('user')->with('msg','Tài khoản hoặc mật khẩu không chính xác');
        }
        // 
    }

    public function logout() {
        session(['username' => null]);
        session(['id' => null]);
        return redirect()->route('user');
    }
}
