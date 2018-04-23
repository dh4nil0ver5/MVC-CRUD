<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
   public $fillable = ['lokasi','nilai_sewa','berat_hasil','nilai_kelola','total_hasil','kuantum','kapasitas_gudang'];
}