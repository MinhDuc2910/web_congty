<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MailBox;
use DB;

class InputEmailController extends Controller
{
    //
    private $userRecruit;
    public function __construct() {
        $this->userRecruit = new MailBox();
    }

    public function postAdd(Request $request) {

        $dataInsert=[
            'email'=>$request-> email,
            'create_at'=>date('Y-m-d H:i:s')

        ];     
        // dd($dataInsert);
        $this->userRecruit->addMailBox($dataInsert);

        return redirect()->route('clientsRecruit')->with('input_email','Chúng tôi đẫ nhận được thông tin của bạn và sẽ phản hồi lại trong thời gian sớm nhất');
    }
}
