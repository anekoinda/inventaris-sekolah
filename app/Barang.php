<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'kode';
    public $incrementing = false;

    public function kat(){
    	return $this->belongsTo('App\Kategori','kategori');
    }
    public function kategori(){
    	return $this->belongsToMany(Kategori::class, 'kategori_barang');
    }
    public function barangKategori(){
        return $this->hasMany('App\KategoriBarang', 'barang_kode');
    }
}
