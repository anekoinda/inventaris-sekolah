<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Obj;
use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $page = 'users';
    protected $success = 'Data Berhasil';
    protected $failed = 'Data Gagal';
    protected $insert = 'Disimpan';
    protected $update = 'Diubah';
    protected $delete = 'Dihapus';


public function __construct()
{
    $this->middleware('auth');
    $this->middleware('admin');
}
    public function index()
    {
        $data = Obj::paginate(10);
        $no=1;
        $page=$this->page;
        return view($this->page.'/index',compact('data','no','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = $this->page;
        return view($this->page.'/create',compact('page'));
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
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = bcrypt($request->password);
        $obj->role = $request->role;
        $save = $obj->save();
        if ($save) {
            # code...
            Session::flash('success',$this->success.$this->insert);
        }

        return redirect('/'.$this->page);
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
        $obj->name = $request->name;
                $obj->email = $request->email;
        $obj->password = bcrypt($request->password);
        $obj->role = $request->role;
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
}
