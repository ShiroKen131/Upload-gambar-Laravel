<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function index()
    {
        $gambars = Gambar::all();
        return view('gambar.index', compact('gambars'));
    }

    public function create()
    {
        return view('gambar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string'
        ]);

        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Store file in public/uploads directory
            $file->storeAs('public/uploads', $filename);

            Gambar::create([
                'file_name' => $filename,
                'keterangan' => $request->keterangan
            ]);

            return redirect()->route('gambar.index')
                ->with('success', 'Gambar berhasil diupload.');
        }

        return back()->with('error', 'Pilih file terlebih dahulu.');
    }

    public function show($id)
    {
        $gambar = Gambar::findOrFail($id);
        return view('gambar.show', compact('gambar'));
    }

    public function destroy($id)
    {
        $gambar = Gambar::findOrFail($id);
        
        // Delete file from storage
        if (Storage::exists('public/uploads/' . $gambar->file_name)) {
            Storage::delete('public/uploads/' . $gambar->file_name);
        }
        
        $gambar->delete();
        
        return redirect()->route('gambar.index')
            ->with('success', 'Gambar berhasil dihapus.');
    }
}