@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New ToDo</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/todos" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-1">
            <label for="message" class="form-label">ToDo</label>
            <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" 
            name="message" required value="{{old('message')}}">
            @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="image" class="form-label">Gambar(jika ada)</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
             name="image" multiple>
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-1">
            <input type="hidden" class="form-control" id="is_complete" 
            name="is_complete" required value=0>
        </div>
        <div class="mb-1">
            <input type="hidden" class="form-control" id="user_id" 
            name="user_id" required value="{{ auth()->user()->id }}" >
        </div>
    
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection