@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Index for Pelajar') }}
                    
                </div>

                <div class="card-body">
                <form action="{{ route('pelajar.import-excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Bulk Pelajar</label>
                        <input type="file" class="form-control" name="attachment">
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
                <hr>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>No Kad Pengenalan</th>
                            <th>Action</th>
                        </tr>
                        @foreach($pelajar as $p)
                        <tr>
                            <td>{{ $p->ID_Pelajar }}</td>
                            <td>{{ $p->Nama }}</td>
                            <td>{{ $p->NoKP }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
