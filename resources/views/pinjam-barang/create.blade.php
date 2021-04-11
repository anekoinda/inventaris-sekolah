@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Peminjaman</div>

                <div class="panel-body">
                    <form action="/{{$page}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Kode</label>
                            <input readonly type="text" name="kode" class="form-control" value="{{$code}}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <select class="form-control" name="pegawai">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($pegawai as $p)
                                {{-- expr --}}
                                <option value="{{$p->kode}}">{{$p->pegawai}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Barang</label>
                            <select class="form-control" name="barang">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($barang as $b)
                                {{-- expr --}}
                                <option value="{{$b->kode}}">{{$b->barang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="status" value="dipinjam" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" name="tanggal" value="{{ date('Y-m-d H:i:s') }}" class="form-control"
                                readonly>
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