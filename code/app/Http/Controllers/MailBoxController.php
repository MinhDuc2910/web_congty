<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MailBox;

use DB;

class MailBoxController extends Controller
{
    private $userRecruit;
    public function __construct() {
        $this->userRecruit = new MailBox();
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function mailBox() {
        $this->AuthLogin();
        $title = 'Danh Sách Hòm Thư';
        $PER_PAGE = 10;

        $feedback = $this->userRecruit->getAllMailBox($PER_PAGE);


        return view('mail_box.index' , compact('title', 'feedback'));
    }

    public function deleteMailBox($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->userRecruit->getDetail($id);
            if(!empty($detail[0])) {
                $deleteMailBox = $this->userRecruit->deleteMailBox($id);
                if($deleteMailBox) {
                    $smg = 'Xóa dữ liệu thành công';
                }else {
                    $smg = 'Bạn không thể xóa dữ liệu lúc này.Vui lòng thử lại sau';
                }

            }else{
                $smg = 'Dữ liệu không tồn tại';
            }
        }else {
            $smg = 'Liên kết không tồn tại';
        }
        return redirect()->route('mailBox') ->with('msg', $smg);
    
    }
}
