<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Test extends Model
{
     //
    public static function simpan($data = array()){
        
        $query = DB::table("test")->insert($data);
        return $query;
    }
     //
    public static function lihat($data = array()){
        $query = DB::table("test")->where($data)->get();
        return $query;
    }
    
     //
    public static function data($data = array()){
        $query = DB::table("test")->get();
        return $query;
    }
    
     //
    public static function ubah($data = array(), $id){
        $data = DB::table("test")->where("id",$id)->update($data);
        echo $data;
        $query = DB::table("test")->where("id",$id)->get();
        return $query;
    }
    
     //
    public static function hapus($id){
        $query = DB::table("test")->where("id",$id)->delete();
        return $query;
    }
    
}
