@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Peminjaman</div>

                <div class="panel-body">
                    <form action="{{ url($page.'/'.$data->kode) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label>Kode</label>
                            <input readonly type="text" name="kode" class="form-control" value="{{$data->kode}}">
                        </div>
                        <div class="form-group">
                            <label>Pegawai</label>
                            <select class="form-control" name="pegawai">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($pegawai as $p)
                                {{-- expr --}}
                                <option {{$data->pegawai == $p->id ? 'selected' :''}} value="{{$p->kode}}">
                                    {{$p->pegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" value="{{$data->jumlah}}">
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