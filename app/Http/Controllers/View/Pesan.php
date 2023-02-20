<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Pesan as ModelsPesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pesan extends Controller
{
    public function admin_pesan_masuk(Request $request)
    {
        $masuk = ModelsPesan::where('pengirim_id', '!=', Auth::user()->id)
            ->where('penerima_id', Auth::user()->id)
            ->get();

        $notif = ModelsPesan::where('id', $request->status)->first();
        if ($request->status == 'terkirim') {
            $notif->update([
                'terkirim' => $notif->terkirim + 1
            ]);
        }

        return view('admin.pesan.pesan_masuk', compact('masuk'));
    }
    public function admin_pesan_terkirim()
    {
        $pesan = ModelsPesan::where('penerima_id', '!=', Auth::user()->id)
            ->where('pengirim_id', Auth::user()->id)
            ->get();
        $penerimas = User::all()->except(Auth::user()->id);
        return view('admin.pesan.pesan_keluar', compact('pesan', 'penerimas'));
    }

    public function pesan_terkirim()
    {
        $pesan = ModelsPesan::where('penerima_id', '!=', Auth::user()->id)
            ->where('pengirim_id', Auth::user()->id)
            ->get();
        $penerimas = User::where('role', 'admin')->get();
        return view('user.pesan.pesan_keluar', compact('pesan', 'penerimas'));
    }


    public function pesan_masuk(Request $request)
    {
        $masuk = ModelsPesan::where('pengirim_id', '!=', Auth::user()->id)
            ->where('penerima_id', Auth::user()->id)
            ->get();

        $notif = ModelsPesan::where('id', $request->status)->first();
        if ($request->status == 'terkirim') {
            $notif->update([
                'terkirim' => $notif->terkirim + 1
            ]);
        }

        return view('user.pesan.pesan_masuk', compact('masuk'));
    }
    public function kirim_pesan(Request $request)
    {
        $pesan = ModelsPesan::create($request->all());
        $penerima = User::where('id', $request->penerima_id)->first();
        return redirect()
            ->back()
            ->with('status', 'success')
            ->with('message', "Berhasil mengirim pesan ke $penerima->fullname");
    }

    public function ubah_status(Request $request)
    {
        $pesan = ModelsPesan::where('id', $request->id)->first();
        $pesan->update([
            'status' => 'dibaca'
        ]);
        return redirect()->back()->with('status', 'success')
            ->with('message', "Pesan '$pesan->judul' telah dibaca");
    }

    public function hapus_pesan($id)
    {
        $pesan = ModelsPesan::findOrFail($id);
        $pesan->delete();

        if ($pesan) {
            return redirect()->back()->with('status', 'success')->with('message', "Pesan '$pesan->judul' berhasil dihapus");
        }
        return redirect()->back()->with('status', 'danger')->with('message', 'Pesan gagal dihapus');
    }
}
