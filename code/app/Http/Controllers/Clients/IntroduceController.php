<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\content\Style;
use App\Models\content\Introduce;
use App\Models\Product;
use App\Models\content\Life;

class IntroduceController extends Controller
{
    private $style;
    private $contact;
    public function __construct() {
        $this->contact = new Contact();
        $this->style = new Style();
        $this->introduce = new Introduce();
        $this->product = new Product();
        $this->life = new Life();
    }
    public function index() {

        $list = $this->contact->getAllContact();
        $contactList= $list[0];

        $titleStyle = 'Phong cách Ggame';
        $style = $this->style->getContentStyle();

        $titleIntroduce = 'Giới thiệu';
        $introduce = $this->introduce->getContentIntroduce();

        $titleProduct = 'Sản phẩm của Ggame';
        $productList = $this->product->getAllProduct();

        $titleLife = 'Cuộc sống tại Ggame';
        $life = $this->life->getContentLife();



        return view('clients.introduce.indext', compact('contactList','titleStyle', 'style','titleIntroduce', 'introduce','titleProduct','productList','titleLife','life'));

    }
}
