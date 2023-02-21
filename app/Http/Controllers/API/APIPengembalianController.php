<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIPengembalianController extends Controller
{
    public function get($id = null)
    {
        if (isset($id)) {
            $pengembalian =  Peminjaman::where(['user_id' => $id, 'done' => true])->get();
            if (count($pengembalian)) {
                return response()->json([
                    'msg' => 'Data retrieved',
                    'data' => $pengembalian
                ], 200);
            }
            return response()->json([
                'msg' => 'Data Tidak Ada'
            ], 404);
        } else {
            $pengembalian =  Peminjaman::where('done', true)->get();
            if (count($pengembalian)) {
                return response()->json([
                    'msg' => 'Data retrieved',
                    'data' => $pengembalian
                ], 200);
            }
            return response()->json([
                'msg' => 'Data Tidak Ada'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $cek = Peminjaman::where('user_id', $request->user_id)
            ->where('buku_id', $request->buku_id)
            ->where('done', false)
            ->first();

        if (!$cek) {
            return response()->json([
                'msg' => 'Gagal Mengembalikan, Buku yang Dipinjam Tidak Ada'
            ], 400);
        }

        $info_buku = Buku::find($request->buku_id);
        $info_anggota = User::find($request->user_id);

        Pemberitahuan::create([
            'isi' => 'Buku ' . $info_buku->judul . ' pada kategori ' . $info_buku->kategori->nama . ' telah dikembalikan oleh ' . $info_anggota->fullname,
            'buku_id' => $info_buku->id,
            'kategori_id' => $info_buku->kategori_id,
            'status' => 'aktif'
        ]);

        $cek->update([
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
            'done' => true
        ]);

        if ($request->kondisi_buku_saat_dikembalikan == 'baik' && $cek->kondisi_buku_saat_dipinjam == "baik" && $cek->denda == null) {
            $buku = Buku::find($request->buku_id);

            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1
            ]);

            $cek->update([
                'denda' => null
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'buruk' && $cek->kondisi_buku_saat_dipinjam == 'baik') {
            $buku = Buku::find($request->buku_id);

            $buku->update([
                'j_buku_buruk' => $buku->j_buku_buruk + 1
            ]);

            $cek->update([
                'denda' => 20000,
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'baik' && $cek->kondisi_buku_saat_dipinjam == 'buruk') {
            $buku = Buku::find($request->buku_id);

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1
            ]);

            $cek->update([
                'denda' => null,
                'kondisi_buku_saat_dikembalikan' => 'buruk'
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'buruk' && $cek->kondisi_buku_saat_dipinjam == 'buruk') {
            $buku = Buku::find($request->buku_id);

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1
            ]);

            $cek->update([
                'denda' => null
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'hilang') {

            $cek->update([
                'denda' => 50000
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil Mengembalikan Buku',
            'data' => $cek
        ], 200);
    }
}
