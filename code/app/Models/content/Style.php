<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Style extends Model
{
    protected $table= 'content';
    use HasFactory;
    public function getContentStyle($perPage= null) {

        $style = DB::table($this->table)
                    ->where('type', 3)
                    ->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $style= $style->paginate($perPage);
                    }else {
                        $style= $style->get();
                    }
        return $style;
    }

    public function addStyle($data) {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('type', 3)
                ->where('id',$id)
                ->get();

    }

    public function updateStyle($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return  DB::select('UPDATE content SET title= ?, title_en= ?, icon= ?, content= ?, content_en= ?, prioriti= 0, time= 0, type=3, update_at=? WHERE id = ?', $data);
        
    }

    public function deleteStyle($id){
        return DB::table($this->table)->where('id', $id)->where('type', 3)->delete();
        // return  DB::delete('DELETE FROM content WHERE (type =? and id = ?) ', [3 , $id]);
       
    }

}
