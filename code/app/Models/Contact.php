<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Contact extends Model
{
    protected $table= 'contact';
    use HasFactory;

    public function getAllContact($perPage= Null) {

        $contact = DB::table($this->table)->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $contact= $contact->paginate($perPage);
                    }else {
                        $contact= $contact->get();
                    }

        return $contact;
    }

    public function updateContact($data){

        // dd($data);
        return DB::table($this->table)->update($data);
    // return DB::select('UPDATE contact SET company=?, company_en=?,phone=?, email=?,email_recruit=?, address=?, address_en=?, office=?, office_en=?, create_at=?' , $data);
    }
}
