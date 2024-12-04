@extends('layouts.app')
@section('here')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <a href="{{route("createAccount")}}">
                                <h4>Add Post</h4>
                            </a>
                            <h4 class="title">All Post  ({{ $post->count() }})</h4>
                            <br>


                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Title</th>
                                    <th>body</th>
                                    <th>slug</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($post as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->image }}</td>
                                        <td>
                                            <a style="color: black;" class="btn-success btn-sm" href="{{ route('singlepost', $post) }}">View</a>
                                            <a style="color: black;" class="btn-success btn-sm" href="">edit</a>
                                            <td><form action="{{ route('deletepost', $post) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Post - {{ $post->title }}</button>
                                            </form>
                                        </td>


                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
