<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait; 

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Storage;

class ProductController extends Controller
{ 
    use StorageImageTrait;
    private $product;
    public function __construct() {
        $this->product = new Product();
     }

     public function AuthLogin() {
        $admin_id = session('id');
        if($admin_id) {
            return redirect()->route('admin');
        }else {
            return redirect()->route('user')->send();
        }
    }

    public function product() {
        $this->AuthLogin();
        $title = 'Sản Phẩm Của Công Ty';
        $PER_PAGE = 10;

        $productList = $this->product->getAllProduct($PER_PAGE);
        // dd($product);
        return view('product.index' ,compact('title', 'productList'));
    }

    public function addProduct() {
        $this->AuthLogin();
        $title = 'Thêm mới sản phẩm';
        
        // dd($recruit);

        return view('product.addProduct' , compact('title'));
    }

    public function postAdd(ProductRequest $request) {
        $this->AuthLogin();
    //    dd($request->all());
    $data = $this->getStorageUpload($request, 'file_upload', 'product');

       $dataInsert=[
        'name' => $request-> name,
        'link_ios' => $request-> link_ios,
        'link_android' => $request-> link_android,
        'link_windowphone' => $request-> link_window,
        'content' => $request-> describe,
        'create_at' => date('Y-m-d H:i:s')

    ];
    if(!empty($data)) {
        $dataInsert['image'] = $data["file_name"];
        $dataInsert['image_path'] = $data["file_path"];
       }

    // dd( $dataInsert);
   
    $this->product->addProduct($dataInsert);
    return redirect()->route('product')->with('msg','Thêm dữ liệu thành công');
    
    }

    // ---------------Sửa Sản Phẩm-----------------
    public function updateProduct(Request $request ,$id= 0) {
        $this->AuthLogin();
        $title = 'Sửa nội dung sản phẩm';

        if(!empty($id)) {
            $detail = $this->product->getDetail($id);
            if(!empty($detail[0])) {
                $request->session()->put('id', $id);
                $productDetail= $detail[0];

            }else {
                return redirect()->route('product')->with('msg','Dữ liệu không tồn tại');
            }

        }else {

            return redirect()->route('product')->with('msg','Liên kết không tồn tại');
        }

        return view('product.editProduct' , compact('title', 'productDetail'));
     }


    public function editProduct(ProductRequest $request,) {
        $id= session('id');
        if(empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        } 
        $data = $this->getStorageUpload($request, 'file_upload', 'product');
        
       $dataUpdate = [
        'name' => $request-> name,
        'link_ios' => $request-> link_ios,
        'link_android' => $request-> link_android,
        'link_windowphone' => $request-> link_window,
        'content' => $request-> describe,
        'create_at' => date('Y-m-d H:i:s')

       ];
       if(!empty($data)) {
        $dataUpdate['image'] = $data["file_name"];
        $dataUpdate['image_path'] = $data["file_path"];
       }

    //    dd($dataUpdate);

        $this->product->updateProduct($dataUpdate, $id);

        return redirect()->route('product')->with('msg','Update sản phẩm thành công');
    }

    public function deleteProduct($id= 0) {

        if(!empty($id)) {
            
            $detail = $this->product->getDetail($id);
            if(!empty($detail[0])) {
                $deleteProduct = $this->product->deleteProduct($id);
                if($deleteProduct) {
                    $smg = 'Xóa người dùng thành công';
                }else {
                    $smg = 'Bạn không thể xóa người dùng lúc này.Vui lòng thử lại sau';
                }

            }else{
                $smg = 'Người dùng không tồn tại';
            }
        }else {
            $smg = 'Liên kết không tồn tại';
        }
        return redirect()->route('product') ->with('msg', $smg);
    
    }
}
