@extends('layouts.public')
@section('data')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Create Post</h4>

                        </div>
                        <div class="content table-responsive table-full-width">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            <form style="padding: 28px;" action="{{ route('allpost') }}" method="Post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="text">Title:</label>
                                    <input type="text" class="form-control" name="title" id="text">
                                </div>
                                <div class="form-group">
                                    <label for="text">Photo:</label>
                                    <input type="file" class="form-control" name="image" id="text">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Body:</label>
                                    <textarea class="form-control" name="body" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
