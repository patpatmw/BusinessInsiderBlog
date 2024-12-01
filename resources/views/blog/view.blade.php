@extends('layouts.app')
@section('here')
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
                          Posted on :   {{ \Carbon\Carbon::parse($post->created_at)->format('jS F Y') }} | Posted by : {{ $post->userro->name }}
                        </p>

                        <p style="width: 100%">
                            {!! $post->body !!}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>More stories</h2>
                        @foreach ($posts as $item)
                        <a href="{{ route('viewpost',$item) }}"><h5>{{ $item->title }}</h5></a>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
