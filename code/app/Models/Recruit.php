<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Recruit extends Model
{
    protected $table= 'recruitment';
    use HasFactory;
    public function getAllRecruit($perPage= Null) {

        $recruit = DB::table($this->table)->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $recruit= $recruit->paginate($perPage);
                    }else {
                        $recruit= $recruit->get();
                    }
                    

        return $recruit;
    }

    public function addRecruit($data) {
        return DB::table($this->table)->insert($data);
    }

    
    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function updateRecruit($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return DB::select('UPDATE recruitment SET expired_date= ?, department= ?, title= ?, title_en= ?, content= ?, content_en= ?, update_at= ? WHERE id = ?', $data);
     
    }

    public function deleteRecruit($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
