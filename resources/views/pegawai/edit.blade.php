@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Pegawai]</div>

                <div class="panel-body">
                    <form action="{{ url($page.'/'.$data->kode) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label>Kode</label>
                            <input readonly type="text" name="kode" class="form-control" value="{{$data->kode}}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="pegawai" class="form-control" value="{{$data->pegawai}}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{$data->alamat}}">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{$data->telepon}}">
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