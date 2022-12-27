<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AdminRequest;

use App\Models\Admin;

class AdminController extends Controller
{
    //
    private $admin;
    public function __construct() {
       $this->admin = new Admin();
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function admin() {
        $this->AuthLogin();
       $title = 'Admin GGame';
       $PER_PAGE = 2;

       $adminList = $this->admin->getAllAdmin($PER_PAGE);
        // dd($admin);
        return view('admin.index' , compact('title', 'adminList'));
    }

    public function create_account() {
        $this->AuthLogin();
        $title = 'Tạo Tài Khoản';
        
        // dd($recruit);

        return view('admin.create_account' , compact('title'));
    }

    public function postAdd(AdminRequest $request) {
        $this->AuthLogin();
        $dataInsert=[
            'username'=>$request-> username,
            'password'=>$request-> password,
            'fullname'=>$request-> fullname,
            'email'=>$request-> email,
            'create_at'=>date('Y-m-d H:i:s')

        ];
       
        $this->admin->addAdmin($dataInsert);


        return redirect()->route('admin')->with('msg','Thêm dữ liệu thành công');
    }

    public function delete ($id=0){

        if(!empty($id)) {
            
            $adminDetail = $this->admin->getDetail($id);
            if(!empty($adminDetail[0])) {
                $deleteUser = $this->admin->deleteAdmin($id);
                if($deleteUser) {
                    $smg = 'Xóa người dùng thành công';
                }else {
                    $smg = 'Bạn không thể xóa người dùng lúc này.Vui lòng thử lại sau';
                }

            }else{
                $smg = 'Người dùng không tồn tại';
            }
        }else {
            $smg = 'Liên kết không tồn tại';
        }
        return redirect()->route('admin') ->with('msg', $smg);
    }
}
