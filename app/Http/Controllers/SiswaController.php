<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa
     */
    public function index(Request $request)
    {
        $search = $request->search;
        
        $siswa = Siswa::when($search, function($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%")
                          ->orWhere('nis', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(10);
                
        // Pertahankan parameter search saat paginasi
        $siswa->appends(['search' => $search]);
        
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan form tambah siswa
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Menyimpan data siswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);
    
        Siswa::create($request->all());
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail siswa
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Menampilkan form edit siswa
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Memperbarui data siswa
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,'.$siswa->id,
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);
    
        $siswa->update($request->all());
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }    

    /**
     * Menghapus data siswa
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}