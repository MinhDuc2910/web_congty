<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class News extends Model
{
    use HasFactory;
    protected $table= 'news';
    public function getAllNews($perPage= Null) {

        $news = DB::table($this->table)->orderBy('create_at', 'desc');

        if(!empty($perPage)) {
            $news= $news->paginate($perPage);
        }else {
            $news= $news->get();
        }
                   
        return $news;
    }

    public function addNews($data) {
        return DB::table($this->table)->insert($data);
        //DB::insert('INSERT INTO news (title, title_en, img, content, content_en, create_at) values(?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function updateNews($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;

        // return DB::select('UPDATE news SET title=?, title_en=?, img=?, content=?, content_en=?, update_at=? WHERE id = ?', $data);
    }

    public function deleteNews($id){
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
