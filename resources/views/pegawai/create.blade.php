@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Pegawai</div>

                <div class="panel-body">
                    <form action="/{{$page}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Kode</label>
                            <input readonly type="text" name="kode" class="form-control" value="{{$code}}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="pegawai" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection