@extends('dashboard.layouts.main')

@section('container')
    @foreach($todos as $todo)
    <h3 class="mt-4 mb-3">Add Image : {{ $todo->message }}</h3><hr>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/fileupload" class="mb-5" enctype="multipart/form-data">
        @csrf
        <!-- <div class="mb-2">
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
               
                @error('id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div> -->
        <div class="mb-2">
            <label for="path" class="form-label">Choose Image</label>
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
        <input type="hidden" id="todo_id" name="todo_id" value="{{ $todo->id }}">
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="/dashboard/todos/{{ $todos->id }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    @endforeach
@endsection