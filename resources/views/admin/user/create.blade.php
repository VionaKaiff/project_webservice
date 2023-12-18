@extends('layouts.admin.app')
@section('title', 'User')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tambahkan User</h2>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <div class="col-lg-12 mt-4">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nama User">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Example@gmail.com">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Masukkan Password">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <a class="btn btn-dark" href="{{ route('user.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
