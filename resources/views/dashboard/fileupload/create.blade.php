@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">File Upload</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/todos" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="path" class="form-label">Image</label>
            <input class="form-control @error('path') is-invalid @enderror" type="file" id="path"
             name="path" multiple>
            @error('path')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="name" class="form-label">Images Name</label>
            <input class="form-control @error('path') is-invalid @enderror" type="text" id="name"
             name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-1">
            <input type="hidden" class="form-control" id="name" 
            name="name" required value="{{ auth()->user()->id }}" >
        </div>
    
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="/dashboard/fileupload" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection