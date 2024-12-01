@extends('layouts.app')
@section('here')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
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
                                </thead>
                                <tbody>
                                    @foreach ($post as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->image }}</td>
                                        <td>
                                            <a style="color: black;" class="btn-success btn-sm" href="">View</a>
                                            <a style="color: black;" class="btn-success btn-sm" href="">edit</a>



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
