@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit ToDo</h1>
    </div>
    
    <div class='col-lg-8'>
        <form method="post" action="/dashboard/todos/{{ $todos->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">ToDo</label>
                <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" 
                name="message" required value="{{ old('message', $todos->message) }}">
                @error('message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <div >
                    <p>Status :</p>
                    @if ($todos->is_complete == 1)
                        <input class="@error('is_complete') is-invalid @enderror" type="radio" id="0" name="is_complete" 
                        required value=0>
                        <label for="0" >Incomplete</label><br>
                        <input class="@error('is_complete') is-invalid @enderror" type="radio" id="1" name="is_complete" 
                        required value=1 checked>
                        <label for="1" >Completed</label>
                    @else
                        <input class="@error('is_complete') is-invalid @enderror" type="radio" id="0" name="is_complete" 
                        required value="0" checked>
                        <label for=0 >Incomplete</label><br>
                        <input class="@error('is_complete') is-invalid @enderror" type="radio" id="1" name="is_complete" 
                        required value="1">
                        <label for=1 >Completed</label>
                    @endif
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dashboard/todos" class="btn btn-danger">Batal</a>

        </form>
    </div>
@endsection