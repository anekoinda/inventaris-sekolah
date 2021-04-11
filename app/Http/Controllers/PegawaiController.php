<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai as Obj;
use Session;

class PegawaiController extends Controller
{
    protected $page = 'pegawai';
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
        return view($this->page.'/index',compact('data','no','page'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $num = Obj::orderBy('kode','desc')->count();
       $dataCode = Obj::orderBy('kode','desc')->first();
       if ($num ==0) { 
           $code = 'PGW001';
       }
       else{
           $c = $dataCode->kode;
           $code = substr($c, 3)+1;
           $code = "PGW00".$code;
       }

       $page = $this->page;
       return view($this->page.'/create',compact('page','code'));
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
        $obj->alamat = $request->alamat;
        $obj->telepon = $request->telepon;
        $save = $obj->save();

        return redirect('/'.$this->page);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $page = $this->page;
        return view($this->page.'/edit',compact('data','page'));
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
        $obj->alamat = $request->alamat;
        $obj->telepon = $request->telepon;
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


    public function search(Request $request){
        $q = $request->q;
        $page=$this->page;
        if (empty($q)) {
            # code...
            return redirect('/'.$page);
        }
        $data = Obj::where('nama','LIKE','%'.$q.'%')->paginate(10);

        $no=1;
        return view($this->page.'/search',compact('data','no','page','q'));
    }
}
