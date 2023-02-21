<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman as ModelsPeminjaman;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Peminjaman extends Controller
{
    public function show_peminjaman()
    {
        $peminjamans = ModelsPeminjaman::where(['user_id' => Auth::user()->id, 'done' => 0])->get();

        return view('user.peminjaman.peminjaman', compact('peminjamans'));
    }

    public function peminjaman_form()
    {
        $bukus = Buku::all();

        return view('user.peminjaman.form_peminjaman', compact('bukus'));
    }

    public function peminjaman_dashboard(Request $request)
    {
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        return view('user.peminjaman.form_peminjaman', compact('buku_id', 'bukus'));
    }

    public function submit_peminjaman(Request $request)
    {
        $tanggal_peminjaman = $request->tanggal_peminjaman;
        $buku_id = $request->buku_id;
        $kondisi_buku_saat_dipinjam = $request->kondisi_buku_saat_dipinjam;
        $user_id = $request->user_id;

        // $DeferenceInDays = Carbon::parse(Carbon::now())->diffInDays($dataToCompare); // selisih waktu dari tanggal hari ini dengan input tanggal
        // $futureDate = Carbon::parse($tanggal_peminjaman)->addDays(7); // 7 hari dari input tanggal
        // $pastDate = Carbon::parse($tanggal_peminjaman)->subDays(7); // tanggal dari 7 hari ke belakang
        // $cek = ModelsPeminjaman::where(['user_id' => $user_id, 'buku_id' => $buku_id, 'done' => false])->whereBetween('created_at', [$pastDate, Carbon::now()])->get();
        // $cek = ModelsPeminjaman::where(['user_id' => $user_id, 'buku_id' => $buku_id, 'done' => false])->get(); // cek apakah sedang meminjam buku yang sama
        // if (count($cek)) {
        // dd('Anda sudah meminjam buku ini, kembalikan terlebih dahulu');
        // } else {
        //     dd('Berhasil pinjam buku');
        // }
        try {
            $create = ModelsPeminjaman::create([
                "tanggal_peminjaman" => $tanggal_peminjaman,
                "tanggal_pengembalian" => null,
                "buku_id" => $buku_id,
                "kondisi_buku_saat_dipinjam" => $kondisi_buku_saat_dipinjam,
                "user_id" => $user_id
            ]);

            $anggota = User::find($user_id);

            $buku = Buku::find($buku_id);

            if ($create) {
                $pemberitahuan = Pemberitahuan::create([
                    'isi' => 'Buku ' . $buku->judul . ' pada kategori ' . $buku->kategori->nama . ' telah dipinjam oleh ' . $anggota->fullname,
                    'buku_id' => $buku->id,
                    'kategori_id' => $buku->kategori_id,
                    'status' => 'aktif'
                ]);
            }

            if ($buku->j_buku_baik > 0 && $request->kondisi_buku_saat_dipinjam == 'baik') {

                $buku = Buku::where('id', $request->buku_id)->first();

                $buku->update([
                    'j_buku_baik' => $buku->j_buku_baik - 1

                ]);

                return redirect()->route('user.peminjaman')->with('status', 'success')->with('message', 'Berhasil Meminjam Buku');
            } else {
                $fail = ModelsPeminjaman::find($create->id);
                $fail->delete();
                $failMessage = Pemberitahuan::find($pemberitahuan->id);
                $failMessage->delete();
                return redirect()->route('user.peminjaman')->with('status', 'danger')->with('message', "Gagal Meminjam Buku Stock Habis");
            }

            if ($buku->j_buku_buruk > 0 && $request->kondisi_buku_saat_dipinjam == 'buruk') {
                $buku = Buku::where('id', $request->buku_id)->first();

                $buku->update([
                    'j_buku_buruk' => $buku->j_buku_buruk - 1
                ]);
                return redirect()->route('user.peminjaman')->with('status', 'success')->with('message', 'Berhasil Meminjam Buku');
            } else {
                $fail = ModelsPeminjaman::find($create->id);
                $fail->delete();
                $failMessage = Pemberitahuan::find($pemberitahuan->id);
                $failMessage->delete();
                return redirect()->route('user.peminjaman')->with('status', 'danger')->with('message', "Gagal Meminjam Buku Stock Habis");
            }
        } catch (Exception $e) {
            return redirect()->route('user.peminjaman')->with('status', 'danger')->with('message', "Gagal Meminjam Buku");
        }
    }
}
