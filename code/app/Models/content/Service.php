<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Service extends Model
{
    protected $table= 'content';
    use HasFactory;
    public function getContentService($perPage= null) {

        $service = DB::table($this->table)
                    ->where('type', 1)
                    ->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $service= $service->paginate($perPage);
                    }else {
                        $service= $service->get();
                    }

        return $service;
    }

    public function addService($data) {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)
        ->where('type', 1)
        ->where('id',$id)
        ->get();

    }

    public function updateService($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return DB::select('UPDATE content SET title= ?, title_en= ?, icon= ?, content= ?, content_en= ?, type= 1, prioriti= 0, time= 0, update_at=? WHERE id = ?', $data);
    }

    public function deleteService($id){
        return DB::table($this->table)->where('id', $id)->where('type', 1)->delete();
        // return  DB::delete('DELETE FROM content WHERE (type =? and id = ?) ', [1 , $id]);
       
    }

}
