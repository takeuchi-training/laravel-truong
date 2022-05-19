@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/files" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 p-4 ">
                    <h1 class="display-4">Upload new file</h1>
                    <hr>

                    <form action="/files/new" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="myFile">Browse</label>
                                <input type="file" id="myFile" class="form-control" name="myFile"
                                       placeholder="Upload a file" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection