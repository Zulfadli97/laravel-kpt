@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">My Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Update My Profile</li>
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
                        <div class="card-header">{{ __('My Profile') }}</div>

                        <div class="card-body">
                        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
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
                            
                            <div class="form-group">
                                <label>Profile Picture/Avatar</label>
                                <input type="file" class="form-control" name="profile_picture">
                            </div>

                            <button type="submit" class="btn btn-primary form-control">Update My Profile</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
