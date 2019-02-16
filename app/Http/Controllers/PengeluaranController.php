<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Barang;
use App\Anggota;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public const pageLength = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas['datas'] = Pengeluaran::orderBy('id', 'desc')->paginate(self::pageLength);

        return view('pengeluaran.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datas['barangs'] = Barang::pluck('nama', 'id');
        $datas['anggotas'] = Anggota::pluck('nama', 'id');

        return view('pengeluaran.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ( Barang::findOrFail($request->barang_id)->jumlah < $request->jumlah )
            return back()->with('error', 'Stok tidak cukup');

        $this->validate($request, [
            'barang_id' => "required|numeric|exists:barangs,id",
            'anggota_id' => "required|numeric|exists:anggotas,id",
            'harga' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'jumlah' => 'required|numeric|min:1|max:10000',
            'total' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'catatan' => 'max:255'
        ]);

        Pengeluaran::create($request->except(['_token']));

        Barang::findOrFail($request->barang_id)->decrement('jumlah', $request->jumlah);

        return back()->with('success', 'Berhasil menambah pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
        $datas['data'] = $pengeluaran;
        $datas['barangs'] = Barang::pluck('nama', 'id');
        $datas['anggotas'] = Anggota::pluck('nama', 'id');

        return view('pengeluaran.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
        if ( Barang::findOrFail($request->barang_id)->jumlah + $pengeluaran->jumlah < $request->jumlah )
            return back()->with('error', 'Stok tidak cukup');

        $this->validate($request, [
            'barang_id' => "required|numeric|exists:barangs,id",
            'anggota_id' => "required|numeric|exists:anggotas,id",
            'harga' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'jumlah' => 'required|numeric|min:1|max:10000',
            'total' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'catatan' => 'max:255'
        ]);

        Pengeluaran::findOrFail($pengeluaran->id)->update($request->except(['_token']));

        if ( $pengeluaran->barang_id == $request->barang_id )
        {
            Barang::findOrFail($request->barang_id)->increment('jumlah', $pengeluaran->jumlah);
            Barang::findOrFail($request->barang_id)->decrement('jumlah', $request->jumlah);
        }
        else
        {
            Barang::findOrFail($pengeluaran->barang_id)->increment('jumlah', $pengeluaran->jumlah);
            Barang::findOrFail($request->barang_id)->decrement('jumlah', $request->jumlah);
        }

        return back()->with('success', 'Berhasil mengupdate pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        Pengeluaran::findOrFail($pengeluaran->id)->delete();

        back()->with('success', 'Berhasil menghapus data pengeluaran');
    }
}
