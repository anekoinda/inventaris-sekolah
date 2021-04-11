<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamBarang extends Model
{
    protected $primaryKey = 'kode';
    public $incrementing =false;

    public function peg(){
    	return $this->belongsTo('App\Pegawai','pegawai');
    }

    public function brg(){
    	return $this->belongsTo('App\Barang','barang');
    }
}
