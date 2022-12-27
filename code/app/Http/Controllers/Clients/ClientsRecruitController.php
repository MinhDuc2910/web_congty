<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Recruit ;
use App\Models\UserRecruit ;

class ClientsRecruitController extends Controller
{
    //
    private $contact;
    private $recruit;
    private $userRecruit;
    public function __construct() {
        $this->contact = new Contact();
        $this->recruit = new Recruit();
        $this->userRecruit = new UserRecruit();
     }
    public function index() {

        $list = $this->contact->getAllContact();
        $contactList= $list[0];

        $titleRecruit = 'Tuyển dụng';

        $recruit = $this->recruit->getAllRecruit();
        
        
        return view('clients.clients_ recruit.indext', compact('contactList','titleRecruit', 'recruit'));
    }

    public function postAdd(Request $request) {

        $dataInsert=[
            'name'=>$request->name,
            'email'=>$request-> email,
            'phone'=>$request-> phone,
            'birthday'=>$request-> birthday,
            'gender' => $request-> gender,
            'cv'=>$request-> cv,
            'create_at'=>date('Y-m-d H:i:s')

        ];     
        // dd($dataInsert);
        $this->userRecruit->addUserRecruit($dataInsert);

        


        return redirect()->route('clientsRecruit')->with('msg','Chúng tôi đẫ nhận được thông tin của bạn và sẽ phản hồi lại trong thời gian sớm nhất');
    } 

    public function RecruitContent(Request $request ,$id= 0) { 

        $list = $this->contact->getAllContact();
        $contactList= $list[0];

        $recruit = $this->recruit->getAllRecruit();

        if(!empty($id)) {
            $detail = $this->recruit->getDetail($id);
            // dd($detail);
            if(!empty($detail[0])) {
                $request->session()->put('id', $id);
                $recruitDetail= $detail[0];
                // dd($recruitDetail);

            }else {
                return redirect()->route('recruit')->with('msg','Dữ liệu không tồn tại');
            }

        }else {

            return redirect()->route('recruit')->with('msg','Liên kết không tồn tại');
        }

        return view('clients.clients_ recruit.recruitContent.index' , compact('contactList', 'recruit','recruitDetail'));
     }
}
