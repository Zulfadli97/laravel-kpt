@extends('admin.layouts.main')

@section('body')
<div class="container-fluid">
    <h1 class="mt-4">My Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Update My Profile Password</li>
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
                        <form action="{{ route('update-profile-password') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password">   
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Update My Profile Password</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
