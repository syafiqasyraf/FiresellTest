@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">File Upload</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/fileupload" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
             <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="message">Image For</label>
                </div>
                
                <select class="custom-select @error('todo_id') is-invalid @enderror" id="todo_id" 
                name="todo_id" required value="{{old('todo_id')}}">
                    <option selected>Select ToDos</option>
                    @foreach ($todos as $todos)
                    <option value="{{ $todos->id }}">{{ $loop->iteration }} {{ $todos->message }}</option>
                    @endforeach
                </select>
                @error('todo_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
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
        <div class="mb-3">
            <label for="name" class="form-label">Images Name</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
             name="name" required value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="/dashboard/todos" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection