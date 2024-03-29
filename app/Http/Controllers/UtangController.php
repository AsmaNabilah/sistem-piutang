<?php

namespace App\Http\Controllers;

use App\Models\Utang;
use App\Http\Requests\StoreUtangRequest;
use App\Http\Requests\UpdateUtangRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UtangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utang = Utang::all();
        $user = auth()->user();

        $utangs = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get();
        $utang_jml = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get()->count();

        return view('utang/utang',
            [
                'utang' => $utang,
                'utangs' => $utangs,
                'utang_jml' => $utang_jml,
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $utangs = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get();
        $utang_jml = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get()->count();
        $user = auth()->user();
        
        return view('utang/tambah',
            [
                'utangs' => $utangs,
                'utang_jml' => $utang_jml,
                'user' => $user
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUtangRequest $request)
    {
        // insert data ke table pegawai
        DB::table('utang')->insert([
            'nama_transaksi' => $request->nama_transaksi,
            'tanggal_transaksi' => date('Y-m-d', strtotime($request->tanggal_transaksi)),
            'jml_pinjaman' => $request->jml_pinjaman,
            'status' => $request->status,
            'jatuh_tempo' => date('Y-m-d', strtotime($request->jatuh_tempo)),
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/utang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utang $utang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $utang = DB::table('utang')->where('id',$id)->get();
        $utang_jml = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get()->count();
        $user = auth()->user();
        $utangs = Utang::where('jatuh_tempo', '<=', Carbon::now()->addDays(3))->where('status', '=', 'Belum Lunas')->get();

        
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('utang/edit',[
            'utang' => $utang,
            'utangs' => $utangs,
            'utang_jml' => $utang_jml,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtangRequest $request, Utang $utang)
    {
        DB::table('utang')->where('id',$request->id)->update([
            'nama_transaksi' => $request->nama_transaksi,
            'tanggal_transaksi' => date('Y-m-d', strtotime($request->tanggal_transaksi)),
            'jml_pinjaman' => $request->jml_pinjaman,
            'status' => $request->status,
            'jatuh_tempo' => date('Y-m-d', strtotime($request->jatuh_tempo)),
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/utang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('utang')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/utang');
    }
}
