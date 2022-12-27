<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReceiveEmail;

use App\Http\Requests\ReceiveEmailRequest;

use DB;

class ReceiveEmailController extends Controller
{
    private $receiveEmail;
    public function __construct() {
        $this->receiveEmail = new ReceiveEmail();
     }

     public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function receiveEmail() {
        $this->AuthLogin();
        $title = 'Danh sách email nhận tin';
        $PER_PAGE = 5;

        $receiveEmail = $this->receiveEmail->getAllReceiveEmail($PER_PAGE);
        // dd($receiveEmail);
        return view('receive_email.index' ,compact('title', 'receiveEmail'));
    }

    public function addReceiveEmail() {
        $this->AuthLogin();
        $title = 'Thêm email nhận tin';
        
        // dd($receiveEmail);

        return view('receive_email.add' , compact('title'));
    }

    public function postAdd(ReceiveEmailRequest $request) {

        //    dd($request->all());
    
           $dataInsert=[
            'name'=> $request-> name,
            'email'=> $request-> email,
            'status'=> $request-> status,
            'create_at'=> date('Y-m-d H:i:s')
    
        ];
      
        $this->receiveEmail->addReceiveEmail($dataInsert);
    
        return redirect()->route('receiveEmail')->with('msg','Thêm dữ liệu thành công');
    }

    public function updateReceiveEmail(Request $request ,$id= 0) {
        $this->AuthLogin();
        $title = 'Sửa email nhận tin';
    
        if(!empty($id)) {
                $detail = $this->receiveEmail->getDetail($id);
                if(!empty($detail[0])) {
                    $request->session()->put('id', $id);
                    $receiveEmailDetail= $detail[0];
                    // dd($receiveEmailDetail);
    
            }else {
                    return redirect()->route('receiveEmail')->with('msg','Dữ liệu không tồn tại');
            }
    
        }else {
    
                return redirect()->route('receiveEmail')->with('msg','Liên kết không tồn tại');
        }
    
            return view('receive_email.edit' , compact('title', 'receiveEmailDetail'));
    }

    public function editReceiveEmail(ReceiveEmailRequest $request,) {
        $id= session('id');
        if(empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $dataUpdate=[
            'name'=> $request-> name,
            'email'=> $request-> email,
            'status'=> $request-> status,
            'update_at'=> date('Y-m-d H:i:s')
    
        ];

        // dd($dataUpdate);
        $this->receiveEmail->updateReceiveEmail($dataUpdate, $id);


        return redirect()->route('receiveEmail')->with('msg','Update dữ liệu thành công');
    }

    public function deleteReceiveEmail($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->receiveEmail->getDetail($id);
            if(!empty($detail[0])) {
                $deleteReceiveEmail = $this->receiveEmail->deleteReceiveEmail($id);
                if($deleteReceiveEmail) {
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
        return redirect()->route('receiveEmail') ->with('msg', $smg);
    
    }



}
