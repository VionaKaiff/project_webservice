<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();
        return view('admin.module.index', [
            'modules' => $modules,
        ]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'modul'      => [
                'required',
                'file',
                'mimes:pdf',
                'max:25048',

            ],

            'judul_modul'     => 'required',
            'deskripsi_modul'     => 'required',
        ]);

        $judul = $request->input('judul_modul');
        $deskripsi = $request->input('deskripsi_modul');
        $modul = $request->file('modul');

        if (Module::where('modul', $modul->getClientOriginalName())->exists()) {
            return redirect('/module/create')->withErrors(['Nama modul sudah ada. Pilih nama modul lain.']);
        } else {
            $modul->storeAs('/modul', $modul->getClientOriginalName());

            Module::create([
                'judul_modul' => $judul,
                'deskripsi_modul' => $deskripsi,
                'modul' => $modul->getClientOriginalName(),
            ]);
        }
        return redirect()->route('module.index')
            ->with('success', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Module::where('id', $id)->first();
        return view('admin.module.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $module = Module::where('id', $id)->first();
        $this->validate($request, [
            'modul'      => [
                'file',
                'mimes:pdf',
                'max:25048',
            ],
            'judul_modul'     => 'required',
            'deskripsi_modul'     => 'required',
        ]);

        $judul_modul = $request->input('judul_modul');
        $deskripsi_modul = $request->input('deskripsi_modul');
        $modul = $request->file('modul');


        if ($modul) {
            if (Module::where('modul', $modul->getClientOriginalName())->exists()) {
                return redirect('/module/create')->withErrors(['Nama modul sudah ada']);
            } else {

                // Hapus File Lama
                Storage::delete("modul/{$module->modul}");

                // Simpan File Baru
                $modul->storeAs('/modul', $modul->getClientOriginalName());

                $module->update([
                    'judul_modul' => $judul_modul,
                    'deskripsi_modul' => $deskripsi_modul,
                    'modul' => $modul->getClientOriginalName(),
                ]);
            }
        } else {
            $module->update([
                'judul_modul' => $judul_modul,
                'deskripsi_modul' => $deskripsi_modul,
                'Modul' => $modul,
            ]);
        }

        return redirect()->route('module.index')
            ->with('success', 'Module updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $modul = Module::find($id);

        // Hapus file dari storage jika ada
        Storage::delete("modul/{$modul->modul}");

        // Hapus modul dari database
        $modul->delete();

        return redirect()->route('module.index')
            ->with('success', 'Module deleted successfully');
    }
}
