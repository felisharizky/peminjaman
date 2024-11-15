<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\PC;
use App\Models\Konfirmasi;

class DataController extends Controller
{
    //
    public function index()
    {
        return view('data.index_admin');
    }

    public function indexAdmin(Request $request)
    {
        // Cek apakah user admin atau bukan
        if (auth()->user()->role === 'admin') {
            $pinjams = Pinjam::with('konfirmasi')->get();
        } else {
            $pinjams = Pinjam::with('konfirmasi')->where('user_id', auth()->id())->get();
        }

        // Jika ada filter tanggal, ambil data yang sesuai
        if ($request->has('start_date') && $request->has('end_date')) {
            $pinjams = $pinjams->whereBetween('tanggalPinjam', [$request->start_date, $request->end_date]);
        }

        return view('data.index_admin', compact('pinjams'));
    }
}
