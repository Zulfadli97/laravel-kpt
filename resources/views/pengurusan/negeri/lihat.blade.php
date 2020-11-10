@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">LIHAT Negeri</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lihat Senarai Negeri</li>
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
                        <div class="card-header">{{ __('Lihat Negeri') }}</div>

                        <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>KOD Negeri</label>
                                <input class="form-control" type="text" name="KOD_NEGERI" value="{{ $negeri->KOD_NEGERI }}">
                                @error('KOD_NEGERI')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAMA Negeri</label>
                                <input class="form-control" type="text" name="NAMA_NEGERI" value="{{ $negeri->NAMA_NEGERI }}">
                                @error('NAMA_NEGERI')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary form-control">KEMASKINI MAKLUMAT NEGERI</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
