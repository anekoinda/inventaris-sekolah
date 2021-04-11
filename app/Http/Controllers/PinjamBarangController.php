<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PinjamBarang as Obj;
use App\Barang;
use App\Pegawai;
use Auth;

class PinjamBarangController extends Controller
{
   protected $page = 'pinjam-barang';
    protected $success = 'Data Berhasil';
    protected $failed = 'Data Gagal';
    protected $insert = 'Disimpan';
    protected $update = 'Diubah';
    protected $delete = 'Dihapus';

public function __construct()
{
    $this->middleware('auth');
}


public function index()
{
    $data = Obj::paginate(10);
    $no=1;
    $page=$this->page;
    $pegawai = Pegawai::all();
    return view($this->page.'/index',compact('data','no','page','pegawai'));
}

/**
 * Show the form for creating a new resource
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
     $num = Obj::orderBy('created_at','desc')->count();
        $dataCode = Obj::orderBy('created_at','desc')->first();
    if ($num ==0) { 
        $code = 'PJM001';
    }
    else{
        $c = $dataCode->kode;
        $code = substr($c, 3)+1;
        $code = "PJM00".$code;
    }

    $pegawai = Pegawai::all();
    $barang = Barang::all();
    $page = $this->page;
    return view($this->page.'/create',compact('page','code','pegawai','barang'));
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $obj = new Obj;
    $obj->kode = $request->kode;
    $obj->pegawai = $request->pegawai;
    $obj->barang = $request->barang;
    $obj->jumlah = $request->jumlah;
    $obj->status = $request->status;
    $obj->tanggal = $request->tanggal;
    $save = $obj->save();

    return redirect('/'.$this->page);
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($kpd)
{
    $data = Obj::find($id);
    return view($this->page.'/detail',compact('data'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data= Obj::find($id);
    $pegawai = Pegawai::all();
    $page = $this->page;
    return view($this->page.'/edit',compact('data','page','pegawai'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $obj = Obj::find($id);
    $obj->kode = $request->kode;
    $obj->pegawai = $request->pegawai;
    $obj->jumlah = $request->jumlah;
    $save = $obj->save();
    $obj->save();

    return redirect('/'.$this->page);
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $obj = Obj::find($id);
    $obj->delete();
    return redirect('/'.$this->page);
}

public function kembalikan(Request $request, $id)
{
    $obj = Obj::find($id);
    $obj->status = 'kembali';
    $save = $obj->save();
    $obj->save();

    return redirect('/'.$this->page);
}
}
