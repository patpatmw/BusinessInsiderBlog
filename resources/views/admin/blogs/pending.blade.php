@extends('layouts.app')

@section('here')
    <h1>Pending Blogs</h1>
    @if($post->count())
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            <form action="{{ route('admin.blogs.approve', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pending blogs.</p>
    @endif
@endsection
