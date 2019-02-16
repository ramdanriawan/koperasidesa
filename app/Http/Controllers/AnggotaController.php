<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
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
        $datas['datas'] = Anggota::orderBy('id', 'desc')->paginate(self::pageLength);

        return view('anggota.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
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
            'nama' => 'required|min:3|max:50',
            'alamat' => 'required|min:10|max:255',
            'no_hp' => 'required|numeric|digits_between:5,10|unique:anggotas,no_hp',
            'no_ktp' => 'required|numeric|digits_between:16,20|unique:anggotas,no_ktp'
        ]);

        Anggota::create($request->except(['_token']));

        return back()->with('success', 'Berhasil menambahkan anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($anggota)
    {
        $datas['data'] = Anggota::findOrFail($anggota);

        return view('anggota.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $anggota)
    {
        //
        $this->validate($request, [
            'nama' => 'required|min:3|max:50',
            'alamat' => 'required|min:10|max:255',
            'no_hp' => 'required|numeric|digits_between:5,10|unique:anggotas,no_hp',
            'no_ktp' => 'required|numeric|digits_between:16,20|unique:anggotas,no_ktp'
        ]);

        Anggota::findOrFail($anggota)->update($request->except(['_token']));

        return back()->with('success', 'Berhasil mengupdate anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($anggota)
    {
        //
        Anggota::findOrFail($anggota)->delete();

        back()->with('success', 'Berhasil menghapus data anggota');
    }
}
