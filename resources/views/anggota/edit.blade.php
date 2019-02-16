@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Anggota</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.anggota.update', ['anggota' => $data->id]) }}">
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
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $data->alamat }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">No Hp</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ $data->no_hp }}" required autofocus>

                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_ktp" class="col-md-4 col-form-label text-md-right">No Ktp</label>

                            <div class="col-md-6">
                                <input id="no_ktp" type="number" class="form-control{{ $errors->has('no_ktp') ? ' is-invalid' : '' }}" name="no_ktp" value="{{ $data->no_ktp }}" required autofocus>

                                @if ($errors->has('no_ktp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_ktp') }}</strong>
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
