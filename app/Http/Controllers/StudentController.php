<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'no_hp'     => 'required',
            'jenis_kelamin'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
        ]);

        $nama = $request->input('nama');
        $no_hp = $request->input('no_hp');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $email = $request->input('email');
        $password = $request->input('password');

        Student::create([
            'nama' => $nama,
            'no_hp' => $no_hp,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return redirect()->route('student.index')
            ->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Student::where('id', $id)->first();
        return view('admin.student.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->nama = $request->input('nama');
        $student->no_hp = $request->input('no_hp');
        $student->jenis_kelamin = $request->input('jenis_kelamin');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));

        $student->save();

        return redirect()->route('student.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data mahasiswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Lakukan penghapusan data
        $student->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('student.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
