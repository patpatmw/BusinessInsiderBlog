@extends('layouts.public')
@section('data')
    <div class="wrapper">

        <div class="">

            <div class="container px-2 py-5 bg-primary">
                <div class="px-4 py-5 row">
                    <div class="text-center col-sm-12 text-md-left">
                        <h1 class="mb-3 text-white mb-md-0 text-uppercase font-weight-bold">Create your Account</h1>
                    </div>

                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                       <div class="card">
                        <div class="card-body">
                            <form action="{{ route('addUser') }}" method="Post" >
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" required name="name" placeholder="type your name" class="forn-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" required name="email" placeholder="type your email" class="forn-control">
                                </div> <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" required name="password" placeholder="type your password" class="forn-control">
                                </div> <div class="form-group">
                                    <label for="">Password Confirmation</label>
                                    <input type="text" required name="password_confirmation" placeholder="type your name" class="forn-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Save data</button>
                            </form>
                        </div>
                       </div>

                </div>

            </div>

        </div>
    </div>
@endsection
