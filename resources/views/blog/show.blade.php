@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p> 
                <p class="lead text-end">- written by {{ $post->user->name }}</p>
                <hr>
                @can('update', $post)
                    <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                    <br><br>
                    <form id="delete-frm" class="" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete Post</button>
                    </form>
                @endcan
            </div>
        </div>

        <div class="d-flex flex-column mt-3 p-3 rounded-3">
            <h5>Comments</h5>
            @auth
                <span class="btn-add-comment"><i class="bi bi-plus-circle"></i> Add comment</span>
                <div class="comment-form mb-3">
                    <form action="/blog/{{ $post->id }}/comments" method="POST">
                        @csrf
                        <div class="d-flex flex-column">
                            <textarea id="comment" name="comment" placeholder="Add your comment"></textarea>
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            @endauth
            @if ($post->comments()->exists())
                <form id="deleteComment" action="" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                <ul>
                    @foreach ($post->comments as $comment)
                    <div class="rounded-1 p-3 m-1 inset-shadow">
                        <x-card class="p-3">
                            <small><i class="bi bi-person-circle"></i> {{ $comment->user->name }}</small>
                            <form action="/blog/{{ $post->id }}/comments/{{ $comment->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-space-between mb-1">
                                    <textarea readonly class="form-control-plaintext w-100 edit-comment" name="comment">{{ $comment->content }}</textarea>
                                    @can('update', $comment)
                                        <i class="bi bi-pencil ms-1 btn-edit-comment"></i>
                                    @endcan
                                    @can('delete', [$comment, $post])
                                        <i class="bi bi-trash ms-1 btn-delete-comment" 
                                            data-post-id="{{ $post->id }}"
                                            data-comment-id="{{ $comment->id }}"></i>
                                    @endcan
                                </div>
                                <button class="btn btn-outline-success btn-update-comment d-none">Update</button>
                            </form>
                        </x-card>
                        @auth
                            <span class="btn-add-comment">Reply</span>
                            <div class="comment-form mb-3 ms-3">
                                <form action="/blog/{{ $post->id }}/comments/{{ $comment->id }}" method="POST">
                                    @csrf
                                    <div class="d-flex flex-column">
                                        <textarea id="comment" name="comment" placeholder="Add your comment"></textarea>
                                        <button class="btn btn-primary">Reply</button>
                                    </div>
                                </form>
                            </div>
                        @endauth
                        @if ($comment->childComments()->exists())
                        <ul>
                            @foreach ($comment->childComments as $childComment)
                                <x-card class="p-2">
                                    <small><i class="bi bi-person-circle"></i> {{ $childComment->user->name }}</small>
                                    <form action="/blog/{{ $post->id }}/comments/{{ $childComment->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-space-between mb-1">
                                            <textarea readonly class="form-control-plaintext w-100 edit-comment" name="comment">{{ $childComment->content }}</textarea>
                                            @can('update', $childComment)
                                                <i class="bi bi-pencil ms-1 btn-edit-comment"></i>
                                            @endcan
                                            @can('delete', [$childComment, $post])
                                                <i class="bi bi-trash ms-1 btn-delete-comment" 
                                                    data-post-id="{{ $post->id }}"
                                                    data-comment-id="{{ $childComment->id }}"></i>
                                            @endcan
                                            </div>
                                            <button class="btn btn-outline-success btn-update-comment d-none">Update</button>
                                        </form>
                                </x-card> 
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </ul>
                @else
            </div>
            <p>No comments found</p>        
        @endif
    </div>

    @if (session('testMessage'))
        <h3>Test redirect param: {{ session('testMessage') }}</h3>
    @endif

    
@endsection