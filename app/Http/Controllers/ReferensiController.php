<?php

namespace App\Http\Controllers;

use App\Models\Referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referensis = Referensi::all();
        return view('admin.referensi.index', [
            'referensis' => $referensis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.referensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar'      => [
                'required',
                'file',
                'mimes:jpeg,png,jpg',
                'max:25048',

            ],

            'judul_referensi'     => 'required',
            'penulis'     => 'required',
            'tahun'     => 'required',
            'kategori'     => 'required',
            'deskripsi'     => 'required',
        ]);

        $judul = $request->input('judul_referensi');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $kategori = $request->input('kategori');
        $gambar = $request->file('gambar');
        $deskripsi = $request->input('deskripsi');

        if (Referensi::where('gambar', $gambar->getClientOriginalName())->exists()) {
            return redirect('/referensi/create')->withErrors(['Nama referensi sudah ada']);
        } else {
            $gambar->storeAs('/gambar', $gambar->getClientOriginalName());

            Referensi::create([
                'judul_referensi' => $judul,
                'penulis' => $penulis,
                'tahun' => $tahun,
                'kategori' => $kategori,
                'gambar' => $gambar->getClientOriginalName(),
                'deskripsi' => $deskripsi,
            ]);
        }
        return redirect()->route('referensi.index')
            ->with('success', 'Referensi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Referensi $referensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Referensi::where('id', $id)->first();
        return view('admin.referensi.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $referensi = Referensi::where('id', $id)->first();
        $this->validate($request, [
            'gambar'      => [
                'file',
                'mimes:jpg,png,jpeg',
                'max:25048',
            ],
            'judul_referensi'     => 'required',
            'penulis'     => 'required',
            'tahun'     => 'required',
            'kategori'     => 'required',
            'deskripsi'     => 'required',
        ]);

        $judul = $request->input('judul_referensi');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $kategori = $request->input('kategori');
        $gambar = $request->file('gambar');
        $deskripsi = $request->input('deskripsi');


        if ($gambar) {
            $namaFile = $gambar->getClientOriginalName();

            if (Referensi::where('gambar', $namaFile)->exists()) {
                return redirect('/referensi/create')->withErrors(['Gambar sudah ada']);
            } else {
                if ($referensi->gambar) {
                    // Hapus File Lama
                    Storage::delete("gambar/{$referensi->gambar}");
                }

                // Simpan File Baru
                $gambar->storeAs('gambar', $namaFile);

                $referensi->update([
                    'judul_referensi' => $judul,
                    'penulis' => $penulis,
                    'tahun' => $tahun,
                    'kategori' => $kategori,
                    'gambar' => $namaFile,
                    'deskripsi' => $deskripsi,
                ]);
            }
        } else {
            $referensi->update([
                'judul_referensi' => $judul,
                'penulis' => $penulis,
                'tahun' => $tahun,
                'kategori' => $kategori,
                'deskripsi' => $deskripsi,
            ]);
        }

        return redirect()->route('referensi.index')
            ->with('success', 'Referensi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $referensi = Referensi::find($id);

        // Hapus file dari storage jika ada
        Storage::delete("referensi/{$referensi->referensi}");

        // Hapus modul dari database
        $referensi->delete();

        return redirect()->route('referensi.index')
            ->with('success', 'Referensi deleted successfully');
    }
}
