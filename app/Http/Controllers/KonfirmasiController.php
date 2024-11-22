<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\PC;
use App\Models\Konfirmasi;
use Carbon\Carbon;

class KonfirmasiController extends Controller
{
    public function konfirmasi($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
    
        $konfirmasi->status = 'terkonfirmasi';
        $konfirmasi->tanggal_kembali = Carbon::now(); 
        $konfirmasi->save();

        
        $pinjam = Pinjam::find($konfirmasi->pinjam_id);
        $pc = PC::find($pinjam->pc_id);
        $pc->available = true;
        $pc->save();

        $pinjam->tanggalKembali = $konfirmasi->tanggal_kembali;
        $pinjam->save();

        return redirect()->route('data.index_admin')->with('success', 'Pengembalian telah dikonfirmasi.');
    }

    public function tolak($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
       
        $konfirmasi->status = 'ditolak';
        $konfirmasi->save();

        return redirect()->route('data.index_admin')->with('success', 'Pengembalian berhasil ditolak.');
    }

    public function store(Request $request, $pinjam_id)
    {

        $request->validate([
            'tanggal_kembali' => 'required|date', 
        ]);

        Konfirmasi::updateOrCreate(
            ['pinjam_id' => $pinjam_id], 
            [
                'tanggal_kembali' => $request->tanggal_kembali, 
                'status' => 'pending', 
            ]
        );

        return redirect()->route('pinjam.index')->with('success', 'Tanggal kembali berhasil diupdate dan menunggu konfirmasi admin.');


     }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date',
        ]);

        Konfirmasi::create([
            'pinjam_id' => $id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        return redirect()->route('pinjam.index')->with('success', 'Permintaan pengembalian PC berhasil diajukan, menunggu konfirmasi admin.');
    }

    public function index()
        {
            $konfirmasis = Konfirmasi::with('pinjam')->where('status', 'pending')->paginate(10);

            return view('konfirmasi.index', compact('konfirmasis'));
        }

    public function confirm(Request $request, $id)
        {
            $konfirmasi = Konfirmasi::findOrFail($id);

            $konfirmasi->status = 'terkonfirmasi';
            $konfirmasi->tanggal_kembali = Carbon::now(); 
            $konfirmasi->save();
            
            $pinjam = Pinjam::find($konfirmasi->pinjam_id);
            $pc = PC::find($pinjam->pc_id);
            $pc->available = true;
            $pc->save();

            $pinjam->tanggalKembali = $konfirmasi->tanggal_kembali; 
            $pinjam->save();
            return redirect()->route('data.index_admin')->with('success', 'Pengembalian telah dikonfirmasi.');
        }

}