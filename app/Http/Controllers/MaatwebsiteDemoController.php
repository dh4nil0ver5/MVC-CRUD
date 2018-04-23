<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Item;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;

class MaatwebsiteDemoController extends Controller
{
    //
    public function importExport()
	{
		return view('importExport');
	}
	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
                            $sheet = $reader->getSheetByName('data');
//                            $sheet->getCellByColumnAndRow(0,0);         
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = [
                                            'lokasi' => $value->lokasi, 
                                            'nilai_sewa' => $value->nilai_sewa,
                                            'berat_hasil' => $value->berat_hasil,
                                            'nilai_kelola' => $value->nilai_kelola,
                                            'total_hasil' => $value->total_hasil,
                                            'kuantum' => $value->kuantum,
                                            'kapasitas_gudang' => $value->kapasitas_gudang
                                            ];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
//					dd('Insert Record successfully.');
				}
			}
		}
		return Redirect::to("/home");
	}
}
