<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
@extends('layouts.app')

@section('content')
<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="vendor/select2/dist/js/select2.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Barang</div>

                <div class="panel-body">
                    <form action="/{{$page}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Kode</label>
                            <input readonly type="text" name="kode" class="form-control" value="{{$code}}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="barang" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Spesifikasi</label>
                            <textarea class="form-control" name="spesifikasi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto (Jika Ada)</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control">
                        </div>
                        <!--
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($categories as $c)
                                {{-- expr --}}
                                <option value="{{$c->id}}">{{$c->kategori}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control js-example-basic-multiple" name="kategori[]"
                                multiple="multiple">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($categories as $c)
                                {{-- expr --}}
                                <option value="{{$c->id}}">{{$c->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="number" name="jml_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <input type="text" name="kondisi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Sumber Dana</label>
                            <input type="text" name="sumber_dana" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection