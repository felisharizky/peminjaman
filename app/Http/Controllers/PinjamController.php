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
        $pinjams = Pinjam::with('konfirmasi')->paginate(10);
        return view('pinjam.index', compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingPinjam = Pinjam::where('user_id', auth()->id())
            ->whereNull('tanggalKembali')
            ->exists();

        if ($existingPinjam) {
            return redirect()->route('pinjam.index')->with('error', 'Anda tidak dapat meminjam PC baru sebelum mengembalikan PC yang sedang dipinjam.');
        }

        $pcs = PC::where('available', true)->get();
        return view('pinjam.create', compact('pcs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingPinjam = Pinjam::where('user_id', auth()->id())
            ->whereNull('tanggalKembali')
            ->exists();

        if ($existingPinjam) {
            return redirect()->route('pinjam.index')->with('error', 'Anda tidak dapat meminjam PC baru sebelum mengembalikan PC yang sedang dipinjam.');
        }

        $validatedData = $request->validate([
            'pc_id' => 'required|exists:pcs,id',
            'kelengkapan' => 'required|array',
            'tanggalPinjam' => 'required|date',
        ]);

        $pc = PC::find($validatedData['pc_id']);
        $pc->available = false; 
        $pc->save();

        $pinjam = new Pinjam();
        $pinjam->pc_id = $validatedData['pc_id'];
        $pinjam->kelengkapan = json_encode($validatedData['kelengkapan']);
        $pinjam->tanggalPinjam = $validatedData['tanggalPinjam'];
        $pinjam->user_id = auth()->id(); 
        $pinjam->save();

        return redirect()->route('pinjam.index')->with('success', 'PC berhasil dipinjam.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pinjam = Pinjam::findOrFail($id);

        if ($pinjam->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak berhak mengedit data ini.');
        }

        $pcs = PC::where('available', true)->get();

        return view('pinjam.edit', compact('pinjam', 'pcs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pinjam = Pinjam::findOrFail($id);

        if ($pinjam->user_id != auth()->user()->id) {
            abort(403, 'Anda tidak berhak mengupdate data ini.');
        }

        $validatedData = $request->validate([
            'tanggalKembali' => 'required|date',
        ]);

        $pinjam->tanggalKembali = $validatedData['tanggalKembali'];
        $pinjam->save();

        Konfirmasi::updateOrCreate(
            ['pinjam_id' => $pinjam->id],
            ['tanggal_kembali' => $validatedData['tanggalKembali'], 'status' => 'pending']
        );

        $pc = PC::find($pinjam->pc_id);
        $pc->available = true;
        $pc->save();

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    /**
     * Store updated return date and mark the PC as available.
     */
    public function updateTanggalKembali(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'tanggalKembali' => 'required|date',
        ]);

        $pinjam = Pinjam::findOrFail($id);

        $pinjam->tanggalKembali = $validatedData['tanggalKembali'];
        $pinjam->save();

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
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();
        $pc = PC::find($pinjam->pc_id);
        $pc->available = true;
        $pc->save();

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
