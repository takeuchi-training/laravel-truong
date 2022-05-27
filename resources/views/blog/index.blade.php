@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    @if (auth()->user())
                        <div class="col-4">
                            <p>Create new Post</p>
                            <a href="/blog/new" class="btn btn-primary btn-sm">Add Post</a>
                        </div>
                    @endif
                </div>                
                @forelse($posts as $post)
                    <ul>
                        <li><a href="/blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>

        </div>

        <x-pagination :lastPage="$posts->lastPage()" :totalItems="$posts->total()" :onEachSide="$posts->onEachSide" />
    </div>

    {{-- <div>
        @foreach ($posts as $post)
            <p>{{ $post->comments }}</p>
        @endforeach
    </div> --}}
    
@endsection