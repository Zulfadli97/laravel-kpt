@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Daftar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar</li>
    </ol>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">{{ __('Daftar') }}</div>

                        <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" name="KOD_NEGERI" value="">
                                @error('KOD_NEGERI')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>No Kad Pengenalan</label>
                                <input class="form-control" type="text" name="NO_MYKAD" value="">
                                @error('NO_MYKAD')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jantina</label>
                                <input class="form-control" type="text" name="JANTINA" value="">
                                @error('JANTINA')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Skim</label>
                                <input class="form-control" type="text" name="SKIM" value="">
                                @error('SKIM')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gred</label>
                                <input class="form-control" type="text" name="GRED" value="">
                                @error('GRED')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary form-control">SIMPAN MAKLUMAT</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
