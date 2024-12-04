{{-- @extends('layouts.app')
@section('here')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Post  ({{ $posts->count() }})</h4>
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
                                    @foreach ($posts as $posts)
                                    <tr>
                                        <td>{{ $posts->title }}</td>
                                        <td>{{ $posts->body }}</td>
                                        <td>{{ $posts->slug }}</td>
                                        <td>{{ $posts->image }}</td>
                                        <td>
                                            <a href="{{ route('userread', $posts) }}" style="color: black;" class="btn-success btn-sm" href="">View</a>



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
@endsection --}}
@extends('layouts.public')
@section('data')
    <div class="wrapper">

        <div class="">

            <div class="container px-2 py-5 bg-primary">
                <div class="px-4 py-5 row">
                    <div class="text-center col-sm-12 text-md-left">
                        <h1 class="mb-3 text-white mb-md-0 text-uppercase font-weight-bold">{{ $post->title }}</h1>
                    </div>

                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <img class="mb-4 img-fluid mb-md-0" src="{{ asset('images/' . $post->image) }}" alt="Image">
                        <p>
                          Posted on :   {{ \Carbon\Carbon::parse($post->created_at)->format('jS F Y') }} | Posted by :
                        </p>

                        <p style="width: 100%">
                            {!! $post->body !!}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>More stories</h2>
                        @foreach ($posts as $item)
                        <a href=""><h5>{{ $item->title }}</h5></a>
                        @endforeach
                    </div>

                </div>

            </div>  

        </div>
    </div>
@endsection

