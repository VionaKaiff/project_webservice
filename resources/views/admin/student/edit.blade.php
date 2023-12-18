@extends('layouts.admin.app')
@section('title', 'Mahasiswa')
@section('content')

<div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Data Mahasiswa</h2>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Something went wrong.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-4">
                <div class="col-lg-12 mt-4">
                    <form action="{{ route('student.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama </strong>
                                    <input type="text" name="nama" value="{{ $data->nama }}" class="form-control"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No Hp</strong>
                                    <input type="number" name="no_hp" value="{{ $data->no_hp }}" class="form-control"
                                        placeholder="No Hp">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Jenis Kelamin</strong>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="" disabled>-Pilih Jenis Kelamin-</option>
                                        <option value="Laki-laki"
                                            {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="Tidak Ingin Memberi Tahu"
                                            {{ $data->jenis_kelamin == 'Tidak Ingin Memberi Tahu' ? 'selected' : '' }}>Tidak
                                            Ingin Memberi
                                            Tahu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>email</strong>
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan Password">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                                <a class="btn btn-dark" href="{{ route('student.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
