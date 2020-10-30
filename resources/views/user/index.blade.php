@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Index for Users') }}
                    
                </div>

                <div class="card-body">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Group
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('user.index', ['group' => 'KPT']) }}">KPT</a>
                            <a class="dropdown-item" href="{{ route('user.index') }}">All</a>
                        </div>
                    </div>
                    <hr>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->USERID }}</td>
                            <td>{{ $user->NAME }}</td>
                            <td>{{ $user->EMAIL }}</td>
                            <td>
                                <a href="{{ route('user.show', $user) }}" class="btn btn-primary">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
