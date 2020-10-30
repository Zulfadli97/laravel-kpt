@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>

                <div class="card-body">
                <form action="{{ route('update-profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="NAME" value="{{ $user->NAME }}">
                    </div>
                    <div class="form-group">
                        <label>Group Code</label>
                        <input class="form-control" type="text" name="USERGROUPCODE" value="{{ $user->USERGROUPCODE }}">
                    </div>

                    <div class="form-group">
                        <label>Created Date</label>
                        <input class="form-control" type="date" name="CREATEDDATE" value="{{ $user->CREATEDDATE }}">
                    </div>
                    <div class="form-group">
                        <label>IC Number</label>
                        <input class="form-control" type="text" name="NIRC" value="{{ $user->NIRC }}">
                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <input class="form-control" type="email" name="EMAIL" value="{{ $user->EMAIL }}">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input class="form-control" type="number" name="TELNO" value="{{ $user->TELNO }}">
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Update My Profile</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
