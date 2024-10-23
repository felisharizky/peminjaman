<?php

namespace App\Http\Controllers;

use App\Models\PC;
use App\Http\Requests\StorePCRequest; // Tambahkan import ini
use Illuminate\Http\Request;

class PCController extends Controller
{


        // Menampilkan daftar PC (index)
        public function index()
        {
            $pcs = PC::all(); // Ambil semua data PC dari tabel pcs
            return view('pc.index', compact('pcs')); // Kirim data ke view pc.index
        }
    // Menampilkan form untuk menambahkan PC
    public function create()
    {
        return view('pc.create');
    }

    // Menyimpan data PC ke dalam database
    public function store(StorePCRequest $request) // Ganti Request dengan StorePCRequest
    {
        // Menyimpan PC baru
        PC::create([
            'nama' => $request->nama,
            'available' => true, // Set default status ketersediaan
        ]);

        return redirect()->route('pc.index')->with('success', 'PC berhasil ditambahkan.');
    }
    

    public function update(Request $request, $id)
{
     $request->validate([
        'nama' => 'required|string|max:255', // Validasi nama
        'available' => 'boolean', // Validasi available (optional)
    ]);

    $pc = PC::findOrFail($id);
    $pc->update([
        'nama' => $request->nama,
        'available' => $request->available ?? $pc->available, // Gunakan nilai sebelumnya jika available tidak diubah
    ]);

    return redirect()->route('pc.index')->with('success', 'PC berhasil diperbarui.');
}


    public function destroy($id)
    {
        $pc = PC::findOrFail($id);
        $pc->delete();

        return redirect()->route('pc.index')->with('success', 'PC berhasil dihapus.');
    }


    public function edit($id)
{
    $pc = PC::findOrFail($id); // Mengambil data PC berdasarkan id
    return view('pc.edit', compact('pc')); // Mengirim data PC ke view edit
}


}
