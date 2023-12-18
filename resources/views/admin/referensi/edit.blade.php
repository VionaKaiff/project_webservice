@extends('layouts.admin.app')
@section('title', 'Chapter')
@section('content')

<div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Referensi</h2>
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
                    <form action="{{ route('referensi.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Judul</label>
                                    <input type="text" name="judul_referensi" value="{{ $data->judul_referensi }}"
                                        class="form-control" placeholder="Judul Referensi">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Penulis</label>
                                    <input type="text" name="penulis" value="{{ $data->penulis }}" class="form-control"
                                        placeholder="Penulis">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Tahun </label>
                                    <input type="text" name="tahun" value="{{ $data->tahun }}" class="form-control"
                                        placeholder="Tahun Terbit">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Kategori </label>
                                    <input type="text" name="kategori" value="{{ $data->kategori }}" class="form-control"
                                        placeholder="Kategori Referensi">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark" for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control" name="gambar" value="{{ $data->gambar }}"
                                        accept="image/*">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Deskripsi</label>
                                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="6">{{ $data->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                                <a class="btn btn-dark" href="{{ route('referensi.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
