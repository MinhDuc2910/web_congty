<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Product;
use App\Models\content\Service;
use App\Models\News;


class HomeController extends Controller
{
    //
    private $product;
    private $contact;
    public function __construct() {
        $this->contact = new Contact();
        $this->product = new Product();
        $this->service = new Service();
        $this->news = new News();
       
     }

    public function index() {

        $title = '';

        $list = $this->contact->getAllContact();
        $contactList= $list[0];

        $productList = $this->product->getAllProduct();

        $service = $this->service->getContentService();

        $newsList = $this->news->getAllNews();


        return view('clients.home.indext', compact('title', 'contactList', 'productList', 'service', 'newsList'));
    }
    
    public function NewsContent(Request $request ,$id= 0) {
        $list = $this->contact->getAllContact();
        $contactList= $list[0];

        $newsList = $this->news->getAllNews();

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

        return view('clients.layout.newsContent.index', compact('contactList', 'newsList', 'newsDetail'));
     }
}
