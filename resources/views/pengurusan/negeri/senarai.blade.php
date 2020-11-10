@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai Negeri</h1>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Senarai Negeri') }}
                            <div class="float-right">
                                <a href="{{ route('negeri.cipta') }}" class="btn btn-info">+ Cipta Negeri</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Kod Negeri</th>
                                    <th>Nama Negeri</th>
                                    <th>Tindakan</th>
                                </tr>
                                @foreach($senarai_negeri as $negeri)
                                    <tr>
                                        <td>{{ $negeri->ID }}</td>
                                        <td>{{ $negeri->KOD_NEGERI }}</td>
                                        <td>{{ $negeri->NAMA_NEGERI }}</td>
                                        <td>
                                            <a href="{{ route('negeri.lihat', $negeri) }}" class="btn btn-primary">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
