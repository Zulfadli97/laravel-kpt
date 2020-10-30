@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Index for Users') }}</div>

                <div class="card-body">
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
