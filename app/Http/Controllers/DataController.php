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

    public function indexAdmin()
    {
    
        if (auth()->user()->role === 'admin') {
            
            $pinjams = Pinjam::with('konfirmasi')->get();
        } else {
           
            $pinjams = Pinjam::with('konfirmasi')->where('user_id', auth()->id())->get();
        }
    
        return view('data.index_admin', compact('pinjams'));
    }
}
