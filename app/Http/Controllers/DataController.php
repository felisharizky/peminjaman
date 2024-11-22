<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\PC;
use App\Models\Konfirmasi;

class DataController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        return view('data.index_admin');
    }

    /**
     * 
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function indexAdmin(Request $request)
{
    if (auth()->user()->role === 'admin') {
        $pinjams = Pinjam::with('konfirmasi');
    } else {
        $pinjams = Pinjam::with('konfirmasi')->where('user_id', auth()->id());
    }

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $pinjams = $pinjams->whereBetween('tanggalPinjam', [$request->start_date, $request->end_date]);
    }

    if ($request->filled('status')) {
        if ($request->status === 'dipinjam') {
            $pinjams = $pinjams->whereDoesntHave('konfirmasi');
        } else {
            $pinjams = $pinjams->whereHas('konfirmasi', function ($query) use ($request) {
                $query->where('status', $request->status);
            });
        }
    }
    
    $pinjams = $pinjams->paginate(10);

    return view('data.index_admin', compact('pinjams'));
}
} 