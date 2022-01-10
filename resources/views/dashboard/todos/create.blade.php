@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create ToDo</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/todos" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="message" class="form-label">New ToDo</label>
            <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" 
            name="message" required value="{{old('message')}}">
            @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

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
                @error('todo_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div> -->
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
        
        <div class="mb-2">
            <div >
                <p>Status :</p>
                <input type="radio" id="is_complete" name="is_complete" value=0 checked >
                <label for="0" >Incomplete</label><br>
                <input type="radio" id="is_complete" name="is_complete" value=1>
                <label for="1" >Completed</label>
            </div>
            @error('is_complete')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-1">
            <input type="hidden" class="form-control" id="user_id" 
            name="user_id" required value="{{ auth()->user()->id }}" >
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/dashboard/todos" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection