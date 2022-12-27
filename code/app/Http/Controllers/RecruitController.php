<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RecruitRequest;

use App\Models\Recruit ;
use DB;

class RecruitController extends Controller
{
    private $recruit;
    private $html;
    public function __construct() {
        $this->recruit = new Recruit();
        $this->html = '';
     }

     public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function recruit(Request $request) {
        $this->AuthLogin();
        $title = 'Tuyển Dụng'; 
        $PER_PAGE = 10;

        // $htmldepartment=$this->department();
        // dd($htmldepartment)

        $recruit = $this->recruit->getAllRecruit($PER_PAGE);

        return view('recruit.index' ,compact('title', 'recruit'));
    }

    function department() {
        $data = DB::table('recruitment')->get();

        foreach($data as $value) {
            dd($value->department);
            switch ($value->department) {
                case (1):
                    $this->html .= "<option>Lập trình PHP </option>";
                  break;
                case (2):
                    $this->html .= "<option>Lập Trình. NET </option>";
                  break;
                case (3):
                    $this->html .= "<option>Javascript </option>";
                  break;
                case (4):
                    $this->html .= "<option>Mobile</option>";
                  break;
                case (5):
                    $this->html .= "<option>Lập Trình IOS</option>";
                  break;
                case (6):
                    $this->html .= "<option>Lập trình Adroid </option>";
                  break; 
                case (7):
                    $this->html .= "<option>Vận hành, kiểm thử </option>";
                  break;
                case (8):
                    $this->html .= "<option>Kinh doanh </option>";
                  break; 
                default:
                  $this->html .= "<option>Khác </option>";    
            }   
                                   
        }
        return $this->html;  
    }

    public function addRecruit() {
        $this->AuthLogin();
        $title = 'Thêm nội dung tuyển dụng';
        
        // dd($recruit);
       

        return view('recruit.add' , compact('title',));
    }

    public function postAdd(RecruitRequest $request) {

    //    dd($request->all());

       $dataInsert=[
        'expired_date'=> $request-> expired_date,
        'department'=> $request-> department,
        'title'=> $request-> title,
        'title_en'=> $request-> title_en,
        'content'=> $request-> content,
        'content_en'=> $request-> content_en,
        'create_at'=> date('Y-m-d H:i:s')

    ];
    // dd($dataInsert);
  
    $this->recruit->addRecruit($dataInsert);

    return redirect()->route('recruit')->with('msg','Thêm dữ liệu thành công');
    }

    public function updateRecruit(Request $request ,$id= 0) { 
        $this->AuthLogin();
        $title = 'Sửa nội dung tuyển dụng';

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

        return view('recruit.edit' , compact('title', 'recruitDetail'));
     }

     public function editRecruit(RecruitRequest $request,) {
        $id= session('id');
        if(empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $dataUpdate=[
            'expired_date'=> $request-> expired_date,
            'department'=> $request-> department,
            'title'=> $request-> title,
            'title_en'=> $request-> title_en,
            'content'=> $request-> content,
            'content_en'=> $request-> content_en,
            'update_at'=> date('Y-m-d H:i:s')
    
        ];

        // dd($dataUpdate);
        $this->recruit->updateRecruit($dataUpdate, $id);


        return redirect()->route('recruit')->with('msg','Update dữ liệu thành công');
    }

    public function deleteRecruit($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->recruit->getDetail($id);
            if(!empty($detail[0])) {
                $deleteRecruit = $this->recruit->deleteRecruit($id);
                if($deleteRecruit) {
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
        return redirect()->route('recruit') ->with('msg', $smg);
    
    }
}
