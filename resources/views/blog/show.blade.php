@extends('layouts.app')
@section('content')

    {{-- <h1>Comment Example</h1> --}}
    
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p> 
                <hr>
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>

        @if ($post->comments()->exists())
            <div class="d-flex flex-column mt-3 border border-2 border-secondary p-3">
                <h5>Comments</h5>
                <ul>
                    @foreach ($post->comments as $comment)
                        <x-card>
                            <small>User: {{ $comment->user->name }}</small>
                            <p>{{ $comment->content }}</p>
                        </x-card>
                        @if ($comment->childComments()->exists())
                        <ul>
                            @foreach ($comment->childComments as $childComment)
                                <x-card>
                                    <small>User: {{ $childComment->user->name }}</small>
                                    <p>{{ $childComment->content }}</p>
                                </x-card> 
                            @endforeach
                        </ul>
                        @endif
                    @endforeach
                </ul>
            </div>
        @else
            <p>No comments found</p>        
        @endif
    </div>

    @if (session('testMessage'))
        <h3>Test redirect param: {{ session('testMessage') }}</h3>
    @endif

    
@endsection