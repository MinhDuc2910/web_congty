<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\content\Service;
use App\Models\content\Introduce;
use App\Models\content\Style;
use App\Models\content\Life;

use App\Http\Requests\content\ServiceRequest;
use App\Http\Requests\content\IntroduceRequest;
use App\Http\Requests\content\StyleRequest;
use App\Http\Requests\content\LifeRequest;

use App\Traits\StorageImageTrait;


class ContentController extends Controller
{
    use StorageImageTrait;
    private $service;
    private $introduce;
    private $style;
    private $life;

    public function __construct() {
        $this->service = new Service();
        $this->introduce = new Introduce();
        $this->style = new Style();
        $this->life = new Life();
    }

    public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }
    public function content() {
        $this->AuthLogin();
        $title= 'Nội dung, Giới thiệu, Phong cách';
        $PER_PAGE = 5;

        $titleService = 'Dịch vụ';
        $service = $this->service->getContentService($PER_PAGE);
        // dd($service);
        $titleIntroduce = 'Giới thiệu';
        $introduce = $this->introduce->getContentIntroduce($PER_PAGE);
        //  dd($introduce);
        $titleStyle = 'Phong cách';
        $style = $this->style->getContentStyle($PER_PAGE);

        $titleLife = 'Cuộc sống';
        $life = $this->life->getContentLife($PER_PAGE);

        
        //  dd($style);
        return view('content.index' , compact('title','titleService','titleIntroduce', 'titleStyle', 'service', 'introduce', 'style' , 'titleLife', 'life'));
    }

    //--------Phần Dịch Vụ (Service)-----------

    public function addService() {
        $this->AuthLogin();
        $title = 'Thêm dịch vụ mới';


        return view('content.service.add' , compact('title'));
    }

    public function postAdd(ServiceRequest $request) {
    
        $dataInsert=[
            'title'=>$request-> title,
            'title_en'=>$request-> title_en,
            'icon'=>$request-> icon,
            'content'=>$request-> content,
            'content_en'=>$request-> content_en,
            'type' => 1,
            'prioriti' => 0,
            'time' => 0,
            'create_at'=>date('Y-m-d H:i:s')
    
        ];
       
        $this->service->addService($dataInsert);
    
    
        return redirect()->route('content')->with('msg','Thêm dữ liệu thành công');
        }

        public function updateService(Request $request ,$id= 0, ) {
            $this->AuthLogin();
            $title = 'Cập nhật dịch vụ';
    
            if(!empty($id)) {
                $detail = $this->service->getDetail($id);
                if(!empty($detail[0])) {
                    $request->session()->put('id', $id);
                    $serviceDetail= $detail[0];
    
                }else {
                    return redirect()->route('content')->with('msg','Dữ liệu không tồn tại');
                }
    
            }else {
    
                return redirect()->route('content')->with('msg','Liên kết không tồn tại');
            }
    
            return view('content.service.edit' , compact('title', 'serviceDetail'));
         }

         public function editService(ServiceRequest $request) {
            $id= session('id');
            if(empty($id)) {
                return back()->with('msg', 'Liên kết không tồn tại');
            }
            $dataUpdate=[
                'title'=>$request-> title,
                'title_en'=>$request-> title_en,
                'icon'=>$request-> icon,
                'content'=>$request-> content,
                'content_en'=>$request-> content_en,
                'type' => 1,
                'prioriti' => 0,
                'time' => 0,
                'create_at'=>date('Y-m-d H:i:s')
           ];
    
            $this->service->updateService($dataUpdate, $id);
    
            return redirect()->route('content')->with('msg','Update dữ liệu thành công');
        }

        public function deleteService($id= 0) {
            if(!empty($id)) {
                
                $detail = $this->service->getDetail($id);
                if(!empty($detail[0])) {
                    $deleteService = $this->service->deleteService($id);
                    if($deleteService) {
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
            return redirect()->route('content') ->with('msg', $smg);
        
        }





          //--------Phần giới thiệu (introduce)-----------

          public function addIntroduce() {
            $this->AuthLogin();
            $title = 'Thêm giới thiệu mới';
    
    
            return view('content.introduce.add' , compact('title'));
        }
    
        public function postAddIntroduce(IntroduceRequest $request) {


            $dataInsert=[
                'title'=>$request-> title,
                'title_en'=>$request-> title_en,
                'prioriti'=>$request-> prioriti,
                'content'=>$request-> content,
                'content_en'=>$request-> content_en,
                'type' => 2,
                'icon' => "",
                'time' => 0,
                'create_at'=>date('Y-m-d H:i:s')
        
            ];
            $data = $this->getStorageUpload($request, 'file_upload', 'content/introduce');

            if(!empty($data)) {
                $dataInsert['image'] = $data["file_name"];
                $dataInsert['image_path'] = $data["file_path"];
               }
            // dd($dataInsert);
           
            $this->introduce->addIntroduce($dataInsert);
        
            return redirect()->route('content')->with('msg','Thêm dữ liệu thành công');
            }
    
            public function updateIntroduce(Request $request ,$id= 0 ) {
                $this->AuthLogin();
                $title = 'Cập nhật giới thiệu';
        
                if(!empty($id)) {
                    $detail = $this->introduce->getDetail($id);
                    if(!empty($detail[0])) {
                        $request->session()->put('id', $id);
                        $introduceDetail= $detail[0];
        
                    }else {
                        return redirect()->route('content')->with('msg','Dữ liệu không tồn tại');
                    }
        
                }else {
        
                    return redirect()->route('content')->with('msg','Liên kết không tồn tại');
                }
        
                return view('content.introduce.edit' , compact('title', 'introduceDetail'));
             }

             public function editIntroduce(IntroduceRequest $request) {
                $id= session('id');
                if(empty($id)) {
                    return back()->with('msg', 'Liên kết không tồn tại');
                }
                $dataUpdate=[
                    'title'=>$request-> title,
                    'title_en'=>$request-> title_en,
                    'prioriti'=>$request-> prioriti,
                    'content'=>$request-> content,
                    'content_en'=>$request-> content_en,
                    'type' => 2,
                    'icon' => "",
                    'time' => 0,
                    'update_at'=>date('Y-m-d H:i:s')
               ];
               $data = $this->getStorageUpload($request, 'file_upload', 'content/introduce');

            if(!empty($data)) {
                $dataUpdate['image'] = $data["file_name"];
                $dataUpdate['image_path'] = $data["file_path"];
               }
        
                $this->introduce->updateIntroduce($dataUpdate, $id);
                
                return redirect()->route('content')->with('msg','Update dữ liệu thành công');
            }
    
            public function deleteIntroduce($id= 0) {
                if(!empty($id)) {
                    
                    $detail = $this->introduce->getDetail($id);
                    if(!empty($detail[0])) {
                        $deleteIntroduce = $this->introduce->deleteIntroduce($id);
                        if($deleteIntroduce) {
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
                return redirect()->route('content') ->with('msg', $smg);
            
            }

            //----------Phần Phong Cách (Style)---------------

            public function addStyle() {
                $this->AuthLogin();
                $title = 'Thêm phong cách mới';
        
        
                return view('content.style.add' , compact('title'));
            }
        
            public function postAddStyle(StyleRequest $request) {
            
                   $dataInsert=[
                    'title'=>$request-> title,
                    'title_en'=>$request-> title_en,
                    'icon'=>$request-> icon,
                    'content'=>$request-> content,
                    'content_en'=>$request-> content_en,
                    'type' => 3,
                    'prioriti' => 0,
                    'time' => 0,
                    'create_at'=>date('Y-m-d H:i:s')
            
                ];
               
                $this->style->addStyle($dataInsert);
            
            
                return redirect()->route('content')->with('msg','Thêm dữ liệu thành công');
                }
        
                public function updateStyle(Request $request ,$id= 0 ) {
                    $this->AuthLogin();
                    $title = 'Cập nhật phong cách';
            
                    if(!empty($id)) {
                        $detail = $this->style->getDetail($id);
                        if(!empty($detail[0])) {
                            $request->session()->put('id', $id);
                            $styleDetail= $detail[0];
                            
            
                        }else {
                            return redirect()->route('content')->with('msg','Dữ liệu không tồn tại');
                        }
            
                    }else {
            
                        return redirect()->route('content')->with('msg','Liên kết không tồn tại');
                    }
            
                    return view('content.style.edit' , compact('title', 'styleDetail'));
                 }
        
                 public function editStyle(StyleRequest $request) {
                    $id= session('id');
                    if(empty($id)) {
                        return back()->with('msg', 'Liên kết không tồn tại');
                    }
                    $dataUpdate=[
                        'title'=>$request-> title,
                        'title_en'=>$request-> title_en,
                        'icon'=>$request-> icon,
                        'content'=>$request-> content,
                        'content_en'=>$request-> content_en,
                        'type' => 3,
                        'prioriti' => 0,
                        'time' => 0,
                        'update_at'=>date('Y-m-d H:i:s')
                   ];
            
                    $this->style->updateStyle($dataUpdate, $id);
                    return redirect()->route('content')->with('msg','Update dữ liệu thành công');
                }
        
                public function deleteStyle($id= 0) {
                    if(!empty($id)) {
                        
                        $detail = $this->style->getDetail($id);
                        if(!empty($detail[0])) {
                            $deleteStyle = $this->style->deleteStyle($id);
                            if($deleteStyle) {
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
                    return redirect()->route('content') ->with('msg', $smg);
                
                }

    // -----------Phần Cuộc sống -------

                public function addLife() {
                    $this->AuthLogin();
                    $title = 'Thêm mới cuộc sống Ggame';
            
            
                    return view('content.life.add' , compact('title'));
                }
            
                public function postAddLife(LifeRequest $request) {
                
                       $dataInsert=[
                        'title'=>$request-> title,
                        'title_en'=>$request-> title_en,
                        'icon'=>$request-> icon,
                        'content'=>$request-> content,
                        'content_en'=>$request-> content_en,
                        'type' => 4,
                        'prioriti' => 0,
                        'time' => 0,
                        'create_at'=>date('Y-m-d H:i:s')
                
                    ];
                   
                    $this->life->addLife($dataInsert);
                
                
                    return redirect()->route('content')->with('msg','Thêm dữ liệu thành công');
                    }
            
                    public function updateLife(Request $request ,$id= 0 ) {
                        $this->AuthLogin();
                        $title = 'Cập nhật phong cách';
                
                        if(!empty($id)) {
                            $detail = $this->life->getDetail($id);
                            if(!empty($detail[0])) {
                                $request->session()->put('id', $id);
                                $lifeDetail= $detail[0];
                                
                
                            }else {
                                return redirect()->route('content')->with('msg','Dữ liệu không tồn tại');
                            }
                
                        }else {
                
                            return redirect()->route('content')->with('msg','Liên kết không tồn tại');
                        }
                
                        return view('content.life.edit' , compact('title', 'lifeDetail'));
                     }
            
                     public function editLife(LifeRequest $request) {
                        $id= session('id');
                        if(empty($id)) {
                            return back()->with('msg', 'Liên kết không tồn tại');
                        }
                        $dataUpdate=[
                            'title'=>$request-> title,
                            'title_en'=>$request-> title_en,
                            'icon'=>$request-> icon,
                            'content'=>$request-> content,
                            'content_en'=>$request-> content_en,
                            'type' => 4,
                            'prioriti' => 0,
                            'time' => 0,
                            'update_at'=>date('Y-m-d H:i:s')
                       ];
                
                        $this->life->updateLife($dataUpdate, $id);
                        return redirect()->route('content')->with('msg','Update dữ liệu thành công');
                    }
            
                    public function deleteLife($id= 0) {
                        if(!empty($id)) {
                            
                            $detail = $this->life->getDetail($id);
                            if(!empty($detail[0])) {
                                $deleteLife = $this->life->deleteLife($id);
                                if($deleteLife) {
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
                        return redirect()->route('content') ->with('msg', $smg);
                    
                    }

}
