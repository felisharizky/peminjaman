<?php

namespace App\Http\Controllers;

use App\Models\PC;
use App\Http\Requests\StorePCRequest; 
use Illuminate\Http\Request;

class PCController extends Controller
{
    public function index()
    {
         $pcs = PC::all(); 
        return view('pc.index', compact('pcs')); 
    }
   
    public function create()
    {
        return view('pc.create');
    }

    
    public function store(StorePCRequest $request) 
    {
        PC::create([
            'nama' => $request->nama,
            'available' => true, 
        ]);

        return redirect()->route('pc.index')->with('success', 'PC berhasil ditambahkan.');
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255', 
            'available' => 'boolean', 
        ]);

        $pc = PC::findOrFail($id);
        $pc->update([
            'nama' => $request->nama,
            'available' => $request->available ?? $pc->available, 
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
        $pc = PC::findOrFail($id); 
        return view('pc.edit', compact('pc')); 
    }


}
