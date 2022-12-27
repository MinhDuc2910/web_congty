<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
class Event extends Model
{
    use HasFactory;
    protected $table= 'events';
    public function getAllevent($perPage= Null) {

        $event = DB::table($this->table)->orderBy('create_at', 'desc');

        if(!empty($perPage)) {
            $event= $event->paginate($perPage);
        }else {
            $event= $event->get();
        }
                   
        return $event;
    }

    public function addEvent($data) {
        return DB::table($this->table)->insert($data);
        //DB::insert('INSERT INTO event (title, title_en, img, content, content_en, create_at) values(?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function updateEvent($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;

        // return DB::select('UPDATE event SET title=?, title_en=?, img=?, content=?, content_en=?, update_at=? WHERE id = ?', $data);
    }

    public function deletEevent($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
