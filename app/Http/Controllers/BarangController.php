<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    public const pageLength = 3;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas['datas'] = Barang::orderBy('id', 'desc')->paginate(self::pageLength);

        return view('barang.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['total'] = $request->jumlah * $request->harga;

        $this->validate($request, [
            'nama' => 'required|min:3|max:50',
            'jenis' => 'required|in:pupuk,racun',
            'jumlah' => 'required|numeric|min:1|max:1000',
            'harga' => 'required|numeric|min:1000|max:10000000',
            'total' => 'required|numeric:min:1000|max:10000000',
            'gambar' => 'required|image|max:3000',
            'deskripsi' => 'min:5|max:500'
        ]);
        
        $requestData = $request->except(['_token']);

        $requestData['gambar'] = 'imgBarang/' . $request->gambar->getClientOriginalName();

        Barang::create($requestData);

        $request->gambar->move('imgBarang', $request->gambar->getclientOriginalName());

        return back()->with("success", 'Berhasil menyimpan data barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $datas['data'] = $barang;

        return view('barang.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request['total'] = $request->jumlah * $request->harga;

        $this->validate($request, [
            'nama' => 'required|min:3|max:50',
            'jenis' => 'required|in:pupuk,racun',
            'jumlah' => 'required|numeric|min:1|max:1000',
            'harga' => 'required|numeric|min:1000|max:10000000',
            'total' => 'required|numeric:min:1000|max:10000000',
            'gambar' => 'image|max:3000',
            'deskripsi' => 'min:5|max:500'
        ]);

        if ( $request->gambar !== null )
        {
            File::delete($barang->gambar);

            $request->gambar->move('imgBarang', $request->gambar->getclientOriginalName());

            $requestData = $request->except(['_token', '_method']);

            $requestData['gambar'] = 'imgBarang/' . $request->gambar->getClientOriginalName();
        }

        Barang::findOrFail($barang->id)->update($requestData);

        return back()->with('success', 'Berhasil mengupdate data barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::findOrFail($barang->id)->delete();

        back()->with('success', 'Berhasil menghapus data barang');
    }

    public function getBarang(Barang $barang)
    {
        return response()->json($barang);
    }
}
