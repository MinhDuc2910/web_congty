<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ReceiveEmail extends Model
{
    protected $table= 'email_recruit';
    use HasFactory;
    public function getAllReceiveEmail($perPage= Null) {

        $receiveEmail = DB::table($this->table)->orderBy('create_at', 'desc');
                        if(!empty($perPage)) {
                            $receiveEmail= $receiveEmail->paginate($perPage);
                        }else {
                            $receiveEmail= $receiveEmail->get();
                        }

        return $receiveEmail;
    }

    public function addReceiveEmail($data) {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function updateReceiveEmail($data, $id){
        return DB::table($this->table)->where('id', $id)->update($data);

    }

    public function deleteReceiveEmail($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }

}
