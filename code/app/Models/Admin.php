<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Admin extends Model
{
    protected $table= 'admin';
    use HasFactory;
    public function getAllAdmin($perPage= null) {

        $admin = DB::table($this->table)->orderBy('create_at', 'desc');
                if(!empty($perPage)) {
                    $admin= $admin->paginate($perPage);
                }else {
                    $admin= $admin->get();
                }

        return $admin;
    }

    public function addAdmin($data) {
        return DB::table($this->table)->insert($data);
        //DB::insert('INSERT INTO admin (username, password, fullname, email, create_at) values(?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function deleteAdmin($id) {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
