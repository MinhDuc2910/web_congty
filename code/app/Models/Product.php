<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Product extends Model
{
    use HasFactory;

    protected $table= 'product';
    use HasFactory;
    public function getAllProduct($perPage= Null) {

        $product = DB::table($this->table)->orderBy('create_at', 'desc');
                    if(!empty($perPage)) {
                        $product= $product->paginate($perPage);
                    }else {
                        $product= $product->get();
                    }

        return $product;
    }

    public function addProduct($data) {
        return DB::table($this->table)->insert($data);
        //DB::insert('INSERT INTO product (name, icon, link_ios, link_android, link_windowphone, content, create_at) values(?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::table($this->table)
                ->where('id',$id)
                ->get();
    }

    public function updateProduct($data, $id){

        return DB::table($this->table)->where('id', $id)->update($data);

        // $data[] = $id;
        // return DB::select('UPDATE product SET name=?, icon=?, link_ios=?, link_android=?, link_windowphone=?, content=?, update_at=? WHERE id = ?', $data);
    }

    public function deleteProduct($id){
        return DB::table($this->table)->where('id', $id)->delete();;
    }
}
