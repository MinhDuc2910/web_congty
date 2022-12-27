<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;
use App\Traits\StorageImageTrait; 

use App\Models\Event;

class EventController extends Controller
{
    //
    use StorageImageTrait;
    private $event;
    public function __construct() {
        $this->event = new Event(); 
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function event() {
        $this->AuthLogin();
        $PER_PAGE = 10;
        $title = 'Sự Kiện';

        $eventList = $this->event->getAllevent($PER_PAGE);
        // dd($new);
        return view('event.index' ,compact('title', 'eventList'));
    }

    //-------- Thêm dữ liệu mới----------

    public function addEvent() {
        $this->AuthLogin();
        $title = 'Thêm mới sự kiện';
        
        // dd($recruit);

        return view('event.addEvent' , compact('title'));
    }

    public function postAdd(EventRequest $request) {

        $dataInsert=[
            'title'=> $request-> title,
            'time'=> $request-> time,
            'content'=> $request-> content,
            'create_at'=> date('Y-m-d H:i:s')
        ];
        $data = $this->getStorageUpload($request, 'file_upload', 'events');

        if(!empty($data)) {
            $dataInsert['image'] = $data["file_name"];
            $dataInsert['image_path'] = $data["file_path"];
           }
// dd($dataInsert);
        
        $this->event->addEvent($dataInsert);
    
    
        return redirect()->route('event')->with('msg','Thêm dữ liệu thành công');
        }

//     //-------- Update dữ liệu ----------

    //---------Đổ dữ liệu vào from--------
    public function updateEvent(Request $request ,$id= 0) {
        $this->AuthLogin();
        $title = 'Sửa tin tức, sự kiện';

        if(!empty($id)) {
            $detail = $this->event->getDetail($id);
            if(!empty($detail[0])) {
                $request->session()->put('id', $id);
                $eventDetail= $detail[0];
                // dd($eventDetail);

            }else {
                return redirect()->route('event')->with('msg','Dữ liệu không tồn tại');
            }

        }else {

            return redirect()->route('event')->with('msg','Liên kết không tồn tại');
        }

        return view('event.editEvent' , compact('title', 'eventDetail'));
     }

//      // Submit dữ liệu-------------
    public function editEvent(EventRequest $request,) {
        $id= session('id');
        if(empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
       $dataUpdate = [
        'title'=> $request-> title,
            'time'=> $request-> time,
            'image' => $file_name ?? "",
            'content'=> $request-> content,
            'update_at'=> date('Y-m-d H:i:s')
       ];
       $data = $this->getStorageUpload($request, 'file_upload', 'events');
        if(!empty($data)) {
            $dataUpdate['image'] = $data["file_name"];
            $dataUpdate['image_path'] = $data["file_path"];
           }
        //    dd($dataUpdate);

        $this->event->updateEvent($dataUpdate, $id);
        return redirect()->route('event')->with('msg','Update dữ liệu thành công');
    }

    public function deleteEvent($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->event->getDetail($id);
            if(!empty($detail[0])) {
                $deleteEvent = $this->event->deleteEvent($id);
                if($deleteEvent) {
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
        return redirect()->route('event') ->with('msg', $smg);
    
    }
}
