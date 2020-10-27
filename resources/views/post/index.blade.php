@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('post.index') }}" method="GET">
                      <label>Please input keyword</label>
                      <div class="input-group">
                        <input type="text" name="keyword" placeholder="Search" class="form-control" value="{{ request()->get('keyword') }}">

                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                      </div>
                    </form>

                    <br>
                    <hr>

                    <a href="{{ route('post.create') }}" class="btn btn-primary mb-4 float-right">Create New Post</a>

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Attachment</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($collection as $post)
                          <tr>
                            <th scope="row">{{ $post->title }}</th>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if($post->attachment)
                                  <a class="btn btn-success" download href="{{ $post->attachment_url }}">Download</a>
                                  <a class="btn btn-light" target="_blank" href="{{ asset('storage/'.$post->attachment) }}">View</a>
                                @else
                                  no attachment
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('post.destroy',$post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                
                                <a href="{{ route('post.force-delete',$post->id) }}" class="btn btn-lg btn-danger">Force Delete</a>

                            </td>
                          </tr>
                        @empty
                          <tr>
                              <h4>No record found.</h4>
                          </tr>
                        @endforelse
                        </tbody>
                      </table>

                      {{ $collection->appends(
                        [
                          'keyword' => request()->get('keyword')
                        ]
                      )->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
