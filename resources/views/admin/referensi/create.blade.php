@extends('layouts.admin.app')
@section('title', 'Referensi')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tambahkan Referensi</h2>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <div class="col-lg-12 mt-4">
                    <form action="{{ route('referensi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Judul</label>
                                    <input type="text" name="judul_referensi" id="judul_referensi" class="form-control"
                                        placeholder="Judul Referensi">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Penulis</label>
                                    <input type="text" name="penulis" id="penulis" class="form-control"
                                        placeholder="Penulis">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Tahun </label>
                                    <input type="text" name="tahun" id="tahun" class="form-control"
                                        placeholder="Tahun Terbit">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Kategori </label>
                                    <input type="text" name="kategori" id="kategori" class="form-control"
                                        placeholder="Kategori Referensi">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark" for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar"
                                        accept="image/*">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Deskripsi</label>
                                    <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" rows="6"></textarea>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <a class="btn btn-dark" href="{{ route('referensi.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
