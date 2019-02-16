@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Anggota</div>

                <div class="card-body">
                    <div class='table-responsive'>
                        <table class='table table-bordered table-condensed table-striped'>
                            <thead>
                                <tr>
                                    <th>#NO</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>No Ktp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->no_ktp }}</td>
                                    <td>
                                        <a class='btn btn-primary' href='{{ route("admin.anggota.edit", ["anggota" => $data->id]) }}'>Edit</a>

                                        <form class='destroy' action='{{ route("admin.anggota.destroy", ["anggota" => $data->id]) }}' method='post' style='all: initial;'>
                                            @csrf
                                            @method('delete')
                                            <button class='btn btn-danger'>Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $datas->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection