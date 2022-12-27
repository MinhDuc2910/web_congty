<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Introduce extends Model
{
    protected $table= 'content';
    use HasFactory;
    public function getContentIntroduce($perPage= null) {

        $introduce = DB::table($this->table)
                        ->where('type', 2)
                        ->orderBy('create_at', 'desc');
                        if(!empty($perPage)) {
                            $introduce= $introduce->paginate($perPage);
                        }else {
                            $introduce= $introduce->get();
                        }
        return $introduce;
    }

    public function addIntroduce($data) {

        return DB::table($this->table)->insert($data);
        // DB::insert('INSERT INTO content (title, title_en, prioriti, content, content_en, type, icon, time, create_at) values(?, ?, ?, ?, ?, 2, "", 0, ?)',  $data );
    }

    public function getDetail($id){

        return DB::table($this->table)
                ->where('type', 2)
                ->where('id',$id)
                ->get();

    }

    public function updateIntroduce($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return DB::select('UPDATE content SET title= ?, title_en= ?, prioriti= ?, content= ?, content_en= ?, type= 2, icon= "", time= 0, update_at=? WHERE id = ?', $data);
    }
    public function deleteIntroduce($id){
        return DB::table($this->table)->where('id', $id)->where('type', 2)->delete();
        // return DB::delete('DELETE FROM content WHERE (type =? and id = ?) ', [2 , $id]);
        
    }
}
