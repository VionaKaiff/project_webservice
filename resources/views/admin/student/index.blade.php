@extends('layouts.admin.app')
@section('title', 'Mahasiswa')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
        <div class="card-header py-3">
            <a class="btn btn-primary mb-3" href="{{ route('student.create') }}">Tambah Data</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Jenis Kelamin</th>
                                <th>E-Mail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->nama }}</td>
                                    <td>{{ $student->no_hp }}</td>
                                    <td>{{ $student->jenis_kelamin }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gambar }}</td>
                                    <td>
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('student.edit', $student->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    @endsection
