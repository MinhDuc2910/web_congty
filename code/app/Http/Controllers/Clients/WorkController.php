<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Event;
use App\Models\MailBox;

class WorkController extends Controller
{
    //
    private $contact;
    private $userRecruit;
    private $event;
    public function __construct() {
        $this->contact = new Contact();
        $this->event = new Event(); 
        $this->userRecruit = new MailBox();
    }
    public function index() {
        $list = $this->contact->getAllContact();
        $contactList= $list[0];


        $title = 'Trang Web Công Ty Ggame phần hoạt động';

        $eventList = $this->event->getAllevent();
        return view('clients.work.indext', compact('contactList','title', 'eventList'));
    }
    public function postAdd(Request $request) {

        $dataInsert=[
            'email'=>$request-> email,
            'create_at'=>date('Y-m-d H:i:s')

        ];     
        // dd($dataInsert);
        $this->userRecruit->addMailBox($dataInsert);

        return redirect()->route('work')->with('smg','Chúng tôi đẫ nhận được thông tin của bạn và sẽ phản hồi lại trong thời gian sớm nhất');
    }
}
