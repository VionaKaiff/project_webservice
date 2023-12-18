@extends('layouts.admin.app')
@section('title', 'Referensi')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Referensi</h1>
        <div class="card-header py-3">
            <a class="btn btn-primary mb-3" href="{{ route('referensi.create') }}">Tambah Data</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Modul</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referensis as $referensi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $referensi->judul_referensi }}</td>
                                    <td>{{ $referensi->penulis }}</td>
                                    <td>{{ $referensi->tahun }}</td>
                                    <td>{{ $referensi->kategori }}</td>
                                    <td>{{ $referensi->gambar }}</td>
                                    <td>{{ $referensi->deskripsi }}</td>
                                    <td>
                                        <form action="{{ route('referensi.destroy', $referensi->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('referensi.edit', $referensi->id) }}">Edit</a>

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
