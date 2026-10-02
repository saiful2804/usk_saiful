<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::latest()->get();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|max:50',
            'nama_skema' => 'required|max:255',
            'deskripsi' => 'nullable',
        ], [
            'kode_skema.required' => 'Kode skema wajib diisi.',
            'nama_skema.required' => 'Nama skema wajib diisi.',
        ]);

        Skema::create($validated);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil ditambahkan.');
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|max:50',
            'nama_skema' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        $skema->update($validated);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil diubah.');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil dihapus.');
    }
}