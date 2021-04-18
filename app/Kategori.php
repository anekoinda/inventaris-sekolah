<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function brg(){
    	return $this->belongsTo('App\Barang','barang');
    }
    public function barang(){
    	return $this->belongsToMany(Barang::class,'kategori_barang');
    }
}