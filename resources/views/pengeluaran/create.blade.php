@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pengeluaran</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.pengeluaran.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="barang" class="col-md-4 col-form-label text-md-right">Barang</label>

                            <div class="col-md-6">
                                <select id="barang_id" type="text" class="pengeluaranBarang form-control{{ $errors->has('barang_id') ? ' is-invalid' : '' }}" name="barang_id">
                                    <option value=''>-- Pilih Barang --</option>
                                    @foreach( $barangs as $id => $nama )
                                    <option value='{{ $id }}' {{ $id == old('barang_id') ? "selected": "" }}>{{ $nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('barang_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barang_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="barang" class="col-md-4 col-form-label text-md-right">Anggota</label>

                            <div class="col-md-6">
                                <select id="anggota_id" type="text" class="pengeluaranAnggota form-control{{ $errors->has('anggota_id') ? ' is-invalid' : '' }}" name="anggota_id">
                                    <option value=''>-- Pilih Anggota --</option>
                                    @foreach( $anggotas as $id => $nama )
                                    <option value='{{ $id }}' {{ $id == old("anggota_id") ? "selected": "" }}>{{ $nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('anggota_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="pengeluaranHarga form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" value="{{ old('harga') }}" required autofocus>

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
                                <input id="jumlah" type="text" class="pengeluaranJumlah form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

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
                                <input id="total" type="text" class="pengeluaranTotal form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" value="{{ old('total') }}" required autofocus>

                                @if ($errors->has('total'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catatan" class="col-md-4 col-form-label text-md-right">Catatan</label>

                            <div class="col-md-6">
                                <textarea id="catatan" type="text" class="form-control{{ $errors->has('catatan') ? ' is-invalid' : '' }}" name="catatan" autofocus>{{ old('catatan') }}</textarea>

                                @if ($errors->has('catatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('catatan') }}</strong>
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
