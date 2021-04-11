@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Peminjaman</div>

                <div class="panel-body">

                    <a class="btn btn-primary" href="{{$page}}/create">Tambah Data</a>

                    <table class="table table-striped">
                        <thead>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                            {{-- expr --}}
                            <tr>
                                <td colspan="6">
                                    <center>Data Tidak Ada</center>
                                </td>
                            </tr>
                            @endif
                            @foreach ($data as $d)
                            <tr>
                                <td>{{$d->kode}}</td>
                                <td>{{$d->peg->pegawai}}</td>
                                <td>{{$d->brg->barang}}</td>
                                <td>{{$d->jumlah}}</td>
                                <td>{{$d->tanggal}}</td>
                                <td>{{$d->status}}</td>

                                <td>
                                    <a href="{{$page.'/'.$d->kode.'/edit'}}" class="btn btn-success">Edit</a>
                                    <button data-toggle="modal" data-target="#confirmModal"
                                        data-action="{{url($page.'/'.$d->kode)}}"
                                        class="btn btn-danger delete-btn">Hapus</button>
                                    <a href="{{$page.'/kembalikan'.'/'.$d->kode}}" class="btn btn-info">Kembali</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center>{{$data->links()}}</center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection