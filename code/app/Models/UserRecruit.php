<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class UserRecruit extends Model
{
    protected $table= 'user_recruit';
    use HasFactory;
    public function getAllUserRecruit($perPage= Null) { 

        $userRecruit = DB::table($this->table)->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $userRecruit= $userRecruit->paginate($perPage);
                    }else {
                        $userRecruit= $userRecruit->get();
                    }

        return $userRecruit;
    }
    public function addUserRecruit($data) {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function deleteUserRecruit($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
