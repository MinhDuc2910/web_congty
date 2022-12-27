<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait; 

use App\Http\Requests\NewsRequest;

use App\Models\News;

use DB;

class NewsController extends Controller
{
    use StorageImageTrait;
    private $news;
    public function __construct() {
        $this->news = new News();
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function news() {
        $this->AuthLogin();
        $PER_PAGE = 10;
        $title = 'Tin Tức, Sự Kiện';

        $newsList = $this->news->getAllNews($PER_PAGE);
        // dd($new);
        return view('news.index' ,compact('title', 'newsList'));
    }

    //-------- Thêm dữ liệu mới----------

    public function addNews() { 
        $this->AuthLogin();
        $title = 'Thêm mới tin tức, sự kiện';
        
        // dd($recruit);

        return view('news.addNews' , compact('title'));
    }

    public function postAdd(NewsRequest $request) {

        $dataInsert=[
            'title'=> $request-> name_vn,
            'title_en'=> $request-> name_en,
            'content'=> $request-> content_vn,
            'content_en'=> $request-> content_en,
            'create_at'=> date('Y-m-d H:i:s')
        ];
        $data = $this->getStorageUpload($request, 'file_upload', 'news');
        if(!empty($data)) {
            $dataInsert['image'] = $data["file_name"];
            $dataInsert['image_path'] = $data["file_path"];
           }

        //    dd($dataInsert);

        $this->news->addNews($dataInsert);
    
    
        return redirect()->route('news')->with('msg','Thêm dữ liệu thành công');
        }

    //-------- Update dữ liệu ----------

    //---------Đổ dữ liệu vào from--------
    public function updateNews(Request $request ,$id= 0) {
        $this->AuthLogin();
        $title = 'Sửa tin tức, sự kiện';

        if(!empty($id)) {
            $detail = $this->news->getDetail($id);
            if(!empty($detail[0])) {
                $request->session()->put('id', $id);
                $newsDetail= $detail[0];
                // dd($newsDetail);

            }else {
                return redirect()->route('news')->with('msg','Dữ liệu không tồn tại');
            }

        }else {

            return redirect()->route('news')->with('msg','Liên kết không tồn tại');
        }

        return view('news.editNews' , compact('title', 'newsDetail'));
     }

     // Submit dữ liệu-------------
    public function editNews(NewsRequest $request,) {
        $id= session('id');
        if(empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $data = $this->getStorageUpload($request, 'file_upload', 'news');
       $dataUpdate = [
        'title'=> $request-> name_vn,
            'title_en'=> $request-> name_en,
            'content'=> $request-> content_vn,
            'content_en'=> $request-> content_en,
            'create_at'=> date('Y-m-d H:i:s')
        ];
        if(!empty($data)) {
            $dataUpdate['image'] = $data["file_name"];
            $dataUpdate['image_path'] = $data["file_path"];
           }

        $this->news->updateNews($dataUpdate, $id);

        return redirect()->route('news')->with('msg','Update dữ liệu thành công');
    }

    public function deleteNews($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->news->getDetail($id);
            if(!empty($detail[0])) {
                $deleteNews = $this->news->deleteNews($id);
                if($deleteNews) {
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
        return redirect()->route('news') ->with('msg', $smg);
    
    }

}
