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
    
    // Update status konfirmasi menjadi 'terkonfirmasi'
    $konfirmasi->status = 'terkonfirmasi';
    $konfirmasi->tanggal_kembali = Carbon::now(); // Update tanggal kembali
    $konfirmasi->save();

    // Update status PC menjadi tersedia lagi
    $pinjam = Pinjam::find($konfirmasi->pinjam_id);
    $pc = PC::find($pinjam->pc_id);
    $pc->available = true;
    $pc->save();

    // Update tanggal kembali di tabel pinjam
    $pinjam->tanggalKembali = $konfirmasi->tanggal_kembali;
    $pinjam->save();

    return redirect()->route('pinjam.index_admin')->with('success', 'Pengembalian telah dikonfirmasi.');
    }

    public function tolak($id)
{
    // Cari data konfirmasi berdasarkan ID
    $konfirmasi = Konfirmasi::findOrFail($id);
    
    // Ubah status konfirmasi menjadi 'ditolak'
    $konfirmasi->status = 'ditolak';
    $konfirmasi->save();

    // Status PC tidak diubah di sini, karena admin menolak pengembalian
    // Tidak ada update pada tabel 'pcs' atau perubahan status 'available'

    return redirect()->route('pinjam.index_admin')->with('success', 'Pengembalian berhasil ditolak.');
}

    public function store(Request $request, $pinjam_id)
    {
    
    // $request->validate([
    //     'pinjam_id' => 'required|exists:pinjams,id',
    //     'tanggal_kembali' => 'required|date',
    // ]);

    // $konfirmasi = new Konfirmasi();
    // $konfirmasi->pinjam_id = $pinjam_id;
    // $konfirmasi->tanggal_kembali = $request->tanggal_kembali;
    // $konfirmasi->status = 'pending'; // Status default
    // $konfirmasi->save();

    // Validasi input
    $request->validate([
        'tanggal_kembali' => 'required|date', // Validasi tanggal kembali
    ]);

    // Update atau buat baru konfirmasi berdasarkan pinjam_id
    Konfirmasi::updateOrCreate(
        ['pinjam_id' => $pinjam_id], // Cari konfirmasi berdasarkan pinjam_id
        [
            'tanggal_kembali' => $request->tanggal_kembali, // Update tanggal kembali
            'status' => 'pending', // Ubah status menjadi 'Menunggu Konfirmasi'
        ]
    );

    return redirect()->route('pinjam.index')->with('success', 'Tanggal kembali berhasil diupdate dan menunggu konfirmasi admin.');


     }

    public function update(Request $request, $id)
{
    $request->validate([
        'tanggal_kembali' => 'required|date',
    ]);

    // Simpan tanggal kembali ke tabel konfirmasi
    Konfirmasi::create([
        'pinjam_id' => $id,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => 'pending',
    ]);

    return redirect()->route('pinjam.index')->with('success', 'Permintaan pengembalian PC berhasil diajukan, menunggu konfirmasi admin.');
}

public function index()
{
    $konfirmasis = Konfirmasi::with('pinjam')->where('status', 'pending')->get();

    return view('konfirmasi.index', compact('konfirmasis'));
}

public function confirm(Request $request, $id)
{
    $konfirmasi = Konfirmasi::findOrFail($id);

    // Ubah status konfirmasi menjadi 'terkonfirmasi'
    $konfirmasi->status = 'terkonfirmasi';
    $konfirmasi->tanggal_kembali = Carbon::now(); // Mengatur tanggal kembali
    $konfirmasi->save();

    // Ubah status PC menjadi available lagi
    $pinjam = Pinjam::find($konfirmasi->pinjam_id);
    $pc = PC::find($pinjam->pc_id);
    $pc->available = true;
    $pc->save();

        // Update tanggal kembali di tabel pinjam
        $pinjam->tanggalKembali = $konfirmasi->tanggal_kembali; // Pastikan ini sesuai dengan field yang ada
        $pinjam->save();
    return redirect()->route('pinjam.index_admin')->with('success', 'Pengembalian telah dikonfirmasi.');
}

}