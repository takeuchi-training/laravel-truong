@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Files!</h1>
                    </div>
                    <div class="col-4">
                        <p>Upload new file</p>
                        <a href="/files/new" class="btn btn-primary btn-sm">Add file</a>
                    </div>
                </div>                
                @forelse($files as $file)
                    <ul>
                        <li>{{ $file->path }}</li>
                        <form action="/files/{{ $file->id }}/delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </ul>
                @empty
                    <p class="text-warning">No files available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection