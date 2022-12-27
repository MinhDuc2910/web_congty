<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;

use App\Models\Contact;

class ContactController extends Controller
{

    private $contact;
    public function __construct() {
        $this->contact = new Contact();
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function contact() {
        $this->AuthLogin();
        $title = 'Thông tin liên hệ';
        $PER_PAGE = 10;

        $list = $this->contact->getAllContact($PER_PAGE);
        $contactList= $list[0];
        // dd($contactList);

        return view('contact.index' ,compact('title', 'contactList'));
    }

    public function editContact(ContactRequest $request) {
       
       $dataUpdate = [
        'company'=> $request-> name,
        'company_en'=> $request-> name_en,
        'phone'=> $request-> phone,
        'email'=> $request-> email,
        'email_recruit'=> $request-> email_recruit,
        'address'=> $request-> address,
        'address_en'=> $request-> address_en,
        'office'=> $request-> office,
        'office_en'=> $request-> office_en,
        'create_at'=> date('Y-m-d H:i:s')
       ];

    //    dd($dataUpdate);

        $this->contact->updateContact($dataUpdate);

        return redirect()->route('contact')->with('msg','Update dữ liệu thành công');
    }


    
}
