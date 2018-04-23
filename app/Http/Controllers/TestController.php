<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{
    // 
    public function form() {
        return view("tambah");
    }
    // 
    public function save_data() {
        Input::get();
        $test = Input::get("test");
        $data = array("kolom" => $test);
        Test::simpan($data);
        return Redirect::to("lihat");
    }
    // 
    public function lihat($id) {
        $data = array("id" => $id);
        $hasil = Test::lihat($data);
        return view("detail")->with(compact('hasil'));
    }
    // 
    public function data() {
        $hasil = Test::data();
        return view("lihat")->with(compact('hasil'));
    }
    // 
    public function ubah($id) {
        Input::all();
        $kolom = Input::get("kolom");
        $data = array("kolom" => $kolom);
        $hasil = Test::ubah($data, $id);
        return view("lihat")->with(compact('hasil'));
    }
    // 
    public function hapus($id) {
        Test::hapus($id);
        $hasil = Test::data();
        return view("lihat")->with(compact('hasil'));
    }
}
