<?php

namespace App\Http\Controllers\View;

use App\Exports\LaporanAnggota;
use App\Exports\LaporanPeminjaman;
use App\Exports\LaporanPengembalian;

use App\Models\Peminjaman;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;

class Laporan extends Controller
{
    // Show View
    public function laporan_peminjaman()
    {
        $peminjamans = Peminjaman::where('done', 0)->get();

        return view('admin.laporan.peminjaman', compact('peminjamans'));
    }
    public function laporan_pengembalian()
    {
        $pengembalians = Peminjaman::where('done', 1)->get();

        return view('admin.laporan.pengembalian', compact('pengembalians'));
    }
    public function laporan_anggota()
    {
        $datas = Peminjaman::get();
        $anggotas = User::where('role', 'user')->get();
        return view('admin.laporan.anggota', compact('datas', 'anggotas'));
    }

    // Export PDF
    public function peminjaman_pdf(Request $request)
    {
        if ($request->tanggal_peminjaman !== null) {
            $datas = Peminjaman::where(['done' => false, 'tanggal_peminjaman' => $request->tanggal_peminjaman])->get();
        } else {
            $datas = Peminjaman::where('done', false)->get();
        }

        $pdf = PDF::loadview('admin.export.pdf_peminjaman', ['datas' => $datas, 'request' => $request->all()])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-peminjaman.pdf');
    }
    public function pengembalian_pdf(Request $request)
    {
        if ($request->tanggal_pengembalian !== null) {
            $datas = Peminjaman::where(['done' => true, 'tanggal_pengembalian' => $request->tanggal_pengembalian])->get();
        } else {
            $datas = Peminjaman::where('done', true)->get();
        }

        $pdf = PDF::loadview('admin.export.pdf_pengembalian', ['datas' => $datas, 'request' => $request->all()])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pengembalian.pdf');
    }
    public function anggota_pdf(Request $request)
    {
        if ($request->done != null) {
            if ($request->done === "false") {
                $datas = Peminjaman::where(['user_id' => $request->user_id, 'done' => false])->get();
            } else {
                $datas = Peminjaman::where(['user_id' => $request->user_id, 'done' => true])->get();
            }

            $anggota = User::find($request->user_id);
        } else {
            $datas = Peminjaman::where('user_id', $request->user_id)->get();
            $anggota = User::find($request->user_id);
        }

        $pdf = PDF::loadview('admin.export.pdf_anggota', ['datas' => $datas, 'anggota' => $anggota])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-anggota-' . $anggota->username . '.pdf');
    }

    // Export Excel
    // public function anggota_excel(Request $request)
    // {
    //     $anggota = User::find($request->user_id);

    //     return Excel::download(new LaporanAnggota($request), 'laporan-anggota-' . $anggota->username . '.xlsx');
    // }
    // public function peminjaman_excel(Request $request)
    // {
    //     return Excel::download(new LaporanPeminjaman($request), 'peminjaman.xlsx');
    // }
    // public function pengembalian_excel(Request $request)
    // {
    //     return Excel::download(new LaporanPengembalian($request), 'pengembalian.xlsx');
    // }
}
