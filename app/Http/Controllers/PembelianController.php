<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
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
        $datas['datas'] = Pembelian::orderBy('id', 'desc')->paginate(self::pageLength);

        return view('pembelian.index', $datas);
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

        return view('pembelian.create', $datas);
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
        $this->validate($request, [
            'barang_id' => "required|numeric|exists:barangs,id",
            'harga' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'jumlah' => 'required|numeric|min:1|max:10000',
            'total' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'catatan' => 'min:5|max:255'
        ]);

        Pembelian::create($request->except(['_token']));

        Barang::findOrFail($request->barang_id)->increment('jumlah', $request->jumlah);

        return back()->with('success', 'Berhasil menambah pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
        $datas['data'] = $pembelian;
        $datas['barangs'] = Barang::pluck('nama', 'id');

        return view('pembelian.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
        $this->validate($request, [
            'barang_id' => "required|numeric|exists:barangs,id",
            'harga' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'jumlah' => 'required|numeric|min:1|max:10000',
            'total' => 'required|numeric|digits_between:4,8|min:1000|max:10000000',
            'catatan' => 'max:255'
        ]);

        Pembelian::find($pembelian->id)->update($request->except(['_token']));
        
        if ( $pembelian->barang_id == $request->barang_id )
        {
            Barang::findOrFail($request->barang_id)->decrement('jumlah', $pembelian->jumlah);
            Barang::findOrFail($request->barang_id)->increment('jumlah', $request->jumlah);
        }
        else
        {
            Barang::findOrFail($pembelian->barang_id)->decrement('jumlah', $pembelian->jumlah);
            Barang::findOrFail($request->barang_id)->increment('jumlah', $request->jumlah);
        }

        return back()->with('success', 'Berhasil mengupdate pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        Pembelian::findOrFail($pembelian->id)->delete();

        back()->with('success', 'Berhasil menghapus data pembelian');
    }
}
