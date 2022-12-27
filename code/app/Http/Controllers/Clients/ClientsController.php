<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ClientsController extends Controller
{
    private $contact;
    public function __construct() {
        $this->contact = new Contact();
    }

    public function index() {

        $title = 'Trang Web Công Ty Ggame';

        $list = $this->contact->getAllContact();

        $contactList= $list[0];

        // dd($contactList); 
        
        return view('clients.home.indext', compact('title', 'contactList'));
    }
}
