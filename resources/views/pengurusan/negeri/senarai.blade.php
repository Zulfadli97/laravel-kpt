@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">Senarai Negeri</h1>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Senarai Negeri') }}</div>
                        <div class="card-body">
                        <table class="table">
                                <tr>
                                    <th>Nama Negeri</th>
                                </tr>
                                @foreach($senarai_negeri as $negeri)
                                    <tr>
                                        <td>{{ $negeri->NAMA_NEGERI }}</td>
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
