<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\PC;
use App\Models\Konfirmasi;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjams = Pinjam::with('konfirmasi')->get();
        return view('pinjam.index', compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pcs = PC::where('available', true)->get();

        return view('pinjam.create', compact('pcs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // 
    
    public function store(Request $request)
    {
    // ngevalidasi data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'kelas' => 'required|string|max:255',
        'pc_id' => 'required|exists:pcs,id', // ngvalidasi biar pc ada di db
        'kelengkapan' => 'required|array',
        'tanggalPinjam' => 'required|date',
    ]);

    // ngeupdate status pc jd ga tersedia
    $pc = PC::find($validatedData['pc_id']);
    $pc->available = false;
    $pc->save();

      // Simpan data peminjaman
      $pinjam = new Pinjam();
      $pinjam->nama = $validatedData['nama'];
      $pinjam->kelas = $validatedData['kelas'];
      $pinjam->pc_id = $validatedData['pc_id'];
      $pinjam->kelengkapan = json_encode($validatedData['kelengkapan']); // Simpan kelengkapan sebagai JSON
      $pinjam->tanggalPinjam = $validatedData['tanggalPinjam'];
      $pinjam->user_id = auth()->id(); // Jika ada, simpan user id
      $pinjam->save();

    return redirect()->route('pinjam.index')->with('success', 'PC berhasil dipinjam.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pinjam = Pinjam::findOrFail($id);

        if ($pinjam->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak berhak mengupdate data ini.');
        }

        return view('pinjam.edit', compact('pinjam'));
    }

    /**
     * Update the specified resource in storage..
     */
    public function update(Request $request, string $id)
    {

        $pinjam = Pinjam::findOrFail($id);

        // Pastikan hanya user yang memiliki peminjaman bisa mengupdate data mereka
        if ($pinjam->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak berhak mengupdate data ini.');
        }

        $pinjam->tanggalKembali = $request->tanggalKembali;
        $pinjam->save();

        Konfirmasi::updateOrCreate(
            ['pinjam_id' => $pinjam->id],
            ['tanggal_kembali' => $request->tanggalKembali, 'status' => 'pending']
        );
        // ngembalin status PC jd tersedia lg 
        $pc = \App\Models\PC::find($pinjam->pc_id);
        $pc->available = true;
        $pc->save();

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil diupdate.');
    
}

    public function updateTanggalKembali(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggalKembali' => 'required|date', // Pastikan input tanggal valid
        ]);

        // Cari data pinjaman berdasarkan id
        $pinjam = Pinjam::findOrFail($id);

        // Update tanggal kembali
        $pinjam->tanggalKembali = $validatedData['tanggalKembali'];
        $pinjam->save();

        // Ubah status PC menjadi tersedia kembali
        $pc = PC::findOrFail($pinjam->pc_id);
        $pc->available = true;
        $pc->save();

        return redirect()->route('pinjam.index')->with('success', 'PC berhasil dikembalikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}