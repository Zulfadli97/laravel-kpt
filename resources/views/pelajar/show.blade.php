@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Lihat Pelajar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lihat Pelajar</li>
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
                        <div class="card-header">{{ __('Lihat Pelajar') }}</div>

                        <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>NAMA</label>
                                <input class="form-control" type="text" name="" value="{{ $pelajar->Nama }}">
                                @error('Nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NO KAD PENGENALAN</label>
                                <input class="form-control" type="text" name="" value="{{ $pelajar->NoKP }}">
                                @error('NoKP')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KOD IPT</label>
                                <select name="Kod_IPT" class="form-control">
                                    <option value="{{ $pelajar->Kod_IPT }}">{{ $pelajar->ipt->NAMA_IPT }} (sekarang)</option>
                                    @foreach($senarai_ipt as $ipt)
                                        @if($pelajar->Kod_IPT != $ipt->KOD_IPT)
                                            <option value="{{ $ipt->KOD_IPT }}">{{ $ipt->NAMA_IPT }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kod Negeri IPT</label>
                                <select name="Kod_Negeri_IPT" class="form-control">
                                    <option value="{{ $pelajar->Kod_Negeri_IPT }}"> {{ $pelajar->negeri->NAMA_NEGERI }} (sekarang)</option>
                                    @foreach($senarai_negeri as $negeri)
                                        <option value="{{ $negeri->KOD_NEGERI }}"> {{ $negeri->NAMA_NEGERI }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tarikh Data</label>
                                <input class="form-control" type="date" name="" value="{{ $pelajar->Tarikh_Data }}">
                                @error('Tarikh_Data')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <button type="submit" class="btn btn-primary form-control">KEMASKINI MAKLUMAT PELAJAR</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
