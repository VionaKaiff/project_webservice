@extends('layouts.admin.app')
@section('title', 'Module')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Modul</h1>
        <div class="card-header py-3">
            <a class="btn btn-primary mb-3" href="{{ route('module.create') }}">Tambah Data</a>
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
                                <th>Deskripsi</th>
                                <th>Modul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $module->judul_modul }}</td>
                                    <td>{{ $module->deskripsi_modul }}</td>
                                    <td>
                                        <a href="{{ route('show-modul', ['filename' => $module->modul]) }}"
                                            target="_blank">{{ $module->modul }}</a>
                                    </td>

                                    <td>
                                        <form action="{{ route('module.destroy', $module->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('module.edit', $module->id) }}">Edit</a>

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
