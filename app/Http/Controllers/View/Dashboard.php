<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\User;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $anggota = User::where('role', 'user')->get();
        $buku = Buku::get();
        $peminjaman = Peminjaman::where('done', false)->get();
        $pengembalian = Peminjaman::where('done', true)->get();
        $pemberitahuans = Pemberitahuan::where('status', 'aktif')->orWhere('status', 'admin')->get();
        $identitas = Identitas::first();

        return view('admin.dashboard', compact('anggota', 'buku', 'identitas', 'peminjaman', 'pengembalian', 'pemberitahuans'));
    }
    public function user()
    {
        $pemberitahuans = Pemberitahuan::where('status', 'aktif')->orWhere('status', 'user')->get();
        $data = Kategori::all();
        $kategoris = $data->sortByDesc('bukus');
        $bukus = Buku::all();

        return view('user.dashboard', compact('pemberitahuans', 'kategoris', 'bukus'));
    }
}
