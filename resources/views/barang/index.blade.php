@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang</div>

                <div class="card-body">
                    <div class='table-responsive'>
                        <table class='table table-bordered table-condensed table-striped'>
                            <thead>
                                <tr>
                                    <th>#NO</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->jenis }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>{{ format_idr($data->harga) }}</td>
                                    <td>{{ format_idr($data->total) }}</td>
                                    <td>
                                        <img src="{{ url($data->gambar) }}" width='100' height='100'/>
                                    </td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>
                                        <a class='btn btn-primary' href='{{ route("admin.barang.edit", ["barang" => $data->id]) }}'>Edit</a>

                                        <form class='destroy' action='{{ route("admin.barang.destroy", ["barang" => $data->id]) }}' method='post' style='all: initial;'>
                                            @csrf
                                            @method('delete')
                                            <button class='btn btn-danger'>Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th>{{ $datas->sum('jumlah') }}</th>
                                    <th></th>
                                    <th>{{ format_idr($datas->sum('total')) }}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{ $datas->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection