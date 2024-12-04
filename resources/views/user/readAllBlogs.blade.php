
@extends('layouts.public')
@section('data')
<div class="wrapper">

    <div class="">

        <div class="container px-2 py-5 bg-primary">
            <div class="px-4 py-5 row">
                <div class="text-center col-sm-12 text-md-left">
                    <h1 class="mb-3 text-white mb-md-0 text-uppercase font-weight-bold">My Blog</h1>
                </div>
               @guest
               <a href="{{ route('createAccount') }}">
                <button class="btn btn-info btn-lg">Create User Account</button>
            </a>
               @endguest
               @auth
               <a href="{{ route('createStory') }}">
                <button class="btn btn-info btn-lg">Add Story</button>
            </a>

            <a href="{{ route('logout') }}">
                <button style="alight-right" class="btn btn-danger btn-lg">Log out</button>
            </a>

               @endauth
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Blog List Start -->
        <div class="container pt-5 bg-white">
            @foreach ($posts as $post)
                <div class="px-3 pb-5 row blog-item">
                    <div class="col-md-5">
                        <img style="width: 200px; height: 150px;" class="mb-4 img-fluid mb-md-0" src="{{ asset('images/' . $post->image) }}" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="py-2 mb-2 bg-white mt-md-4 px-md-3 font-weight-bold">{{ $post->title }}</h3>
                        <div class="mb-3 d-flex">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($post->created_at)->format('jS F Y') }}</small>
                            {{-- <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small> --}}
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id
                            libero
                        </p>
                        <a class="p-0 btn btn-link" href="{{ route('showStories', $post) }}">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- Blog List End -->


        <!-- Footer Start -->
        <div class="container py-4 text-center bg-secondary">
            <p class="m-0 text-white">
                &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.
                Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
        <!-- Footer End -->
    </div>
</div>
@endsection
