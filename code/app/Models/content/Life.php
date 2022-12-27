<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Life extends Model
{
    protected $table= 'content';
    use HasFactory;
    public function getContentLife($perPage= null) {

        $life = DB::table($this->table)
                    ->where('type', 4)
                    ->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $life= $life->paginate($perPage);
                    }else {
                        $life= $life->get();
                    }
        return $life;
    }

    public function addLife($data) {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('type', 4)
                ->where('id',$id)
                ->get();

    }

    public function updateLife($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return  DB::select('UPDATE content SET title= ?, title_en= ?, icon= ?, content= ?, content_en= ?, prioriti= 0, time= 0, type=3, update_at=? WHERE id = ?', $data);
        
    }

    public function deleteLife($id){
        return DB::table($this->table)->where('id', $id)->where('type', 4)->delete();
        // return  DB::delete('DELETE FROM content WHERE (type =? and id = ?) ', [3 , $id]);
       
    }
}
