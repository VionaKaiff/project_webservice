@extends('layouts.admin.app')
@section('title', 'Informasi')
@section('content')

<div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit User</h2>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <div class="col-lg-12 mt-4">
                    <form action="{{ route('user.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">Nama</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                        placeholder="Nama User">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold text-dark">E-mail</label>
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control"
                                        placeholder="Example@gmail.com">
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
