@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Barang</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.barang.update', ['barang' => $data->id]) }}" enctype='multipart/form-data'>
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $data->nama }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis" class="col-md-4 col-form-label text-md-right">Jenis</label>

                            <div class="col-md-6">
                                <select id="jenis" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis" required autofocus>
                                    <option value='pupuk' {{ $data->jenis == "pupuk" ? "selected" : ""}}>Pupuk</option>
                                    <option value='racun' {{ $data->jenis == "racun" ? "selected" : ""}}>Racun</option>
                                </select>

                                @if ($errors->has('jenis'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                                
                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" min='1000' max='10000000' class="barangHarga form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" value="{{ $data->harga }}" required autofocus>

                                @if ($errors->has('harga'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="number" min='1' max='1000' class="barangJumlah form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ $data->jumlah }}" required autofocus>

                                @if ($errors->has('jumlah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">Total</label>

                            <div class="col-md-6">
                                <input id="total" type="number" min='1000' max='10000000' class="barangTotal form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" value="{{ $data->total }}" required autofocus disabled>

                                @if ($errors->has('total'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="gambar" class="col-md-4 col-form-label text-md-right">Gambar</label>

                            <div class="col-md-6">
                                <input id="gambar" type="file" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" name="gambar" autofocus>

                                @if ($errors->has('gambar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gambar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{ $data->deskripsi }}</textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
