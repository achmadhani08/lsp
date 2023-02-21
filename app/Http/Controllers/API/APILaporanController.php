<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class APILaporanController extends Controller
{
    public function peminjaman(Request $request)
    {
        if ($request->tanggal_peminjaman !== null) {
            $datas = Peminjaman::where(['done' => false, 'tanggal_peminjaman' => $request->tanggal_peminjaman])->get();

            if (count($datas)) {
                return response()->json([
                    'msg' => 'Laporan Peminjaman Tanggal ' . $request->tanggal_peminjaman,
                    'datas' => $datas
                ], 201);
            }
            return response()->json([
                'msg' => 'Laporan Peminjaman Tanggal ' . $request->tanggal_peminjaman,
                'datas' => 'Tidak Ada Data'
            ], 201);
        } else {
            $allDatas = Peminjaman::where('done', false)->get();

            if (count($allDatas)) {
                return response()->json([
                    'msg' => 'Laporan Peminjaman Tanggal ' . $request->tanggal_peminjaman,
                    'datas' => $allDatas
                ], 201);
            }
            return response()->json([
                'msg' => 'Laporan Peminjaman Tanggal ' . $request->tanggal_peminjaman,
                'datas' => 'Tidak Ada Data'
            ], 201);
        }
    }
    public function pengembalian(Request $request)
    {
        if ($request->tanggal_pengembalian !== null) {
            $datas = Peminjaman::where(['done' => true, 'tanggal_pengembalian' => $request->tanggal_pengembalian])->get();

            if (count($datas)) {
                return response()->json([
                    'msg' => 'Laporan Pengembalian Tanggal ' . $request->tanggal_pengembalian,
                    'datas' => $datas
                ], 201);
            }
            return response()->json([
                'msg' => 'Laporan Pengembalian Tanggal ' . $request->tanggal_pengembalian,
                'datas' => 'Tidak Ada Data'
            ], 201);
        } else {
            $allDatas = Peminjaman::where('done', true)->get();

            if (count($allDatas)) {
                return response()->json([
                    'msg' => 'Laporan Pengembalian Tanggal ' . $request->tanggal_pengembalian,
                    'datas' => $allDatas
                ], 201);
            }
            return response()->json([
                'msg' => 'Laporan Pengembalian Tanggal ' . $request->tanggal_pengembalian,
                'datas' => 'Tidak Ada Data'
            ], 201);
        }
    }
    public function anggota(Request $request)
    {
        $anggota = User::find($request->user_id);

        if ($request->done != null) {
            if ($request->done === "false") {
                $datasFalse = Peminjaman::where(['user_id' => $request->user_id, 'done' => false])->get();

                if (count($datasFalse)) {
                    return response()->json([
                        'msg' => 'Laporan ' . $anggota->fullname . ' (Belum Dikembalikan)',
                        'datas' => $datasFalse
                    ], 201);
                } else
                    return response()->json([
                        'msg' => 'Laporan ' . $anggota->fullname . ' (Belum Dikembalikan)',
                        'datas' => 'Tidak Ada Data'
                    ], 201);
            } else {
                $datasTrue = Peminjaman::where(['user_id' => $request->user_id, 'done' => true])->get();

                if (count($datasTrue)) {
                    return response()->json([
                        'msg' => 'Laporan ' . $anggota->fullname . ' (Sudah Dikembalikan)',
                        'datas' => $datasTrue
                    ], 201);
                }
                return response()->json([
                    'msg' => 'Laporan ' . $anggota->fullname . ' (Sudah Dikembalikan)',
                    'datas' => 'Tidak Ada Data'
                ], 201);
            }
        } else {
            $allDatas = Peminjaman::where('user_id', $request->user_id)->get();

            if (count($allDatas)) {
                return response()->json([
                    'msg' => 'Laporan ' . $anggota->fullname . ' (Seluruhnya)',
                    'datas' => $allDatas
                ], 201);
            }
            return response()->json([
                'msg' => 'Laporan ' . $anggota->fullname . ' (Seluruhnya)',
                'datas' => 'Tidak Ada Data'
            ], 201);
        }
    }
}
