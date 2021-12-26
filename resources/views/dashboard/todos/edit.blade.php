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
                name="message"  value="{{ old('message', $todos->message) }}">
                @error('message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="form-label">Gambar</label>
                <input type="hidden" name='oldImage' value="{{ $todos->image }}">
                
                @if ($todos->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $todos->image) }}" alt="Gambar"
                    class="img-fluid col-sm-3 d-block mb-3">
                </div>
                @else
                <br><Strong>Tiada gambar.</Strong>
                @endif

                <input class="form-control @error('image') is-invalid @enderror mt-2" type="file" id="image"
                name="image" >
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dashboard/todos" class="btn btn-danger">Batal</a>

        </form>
    </div>
@endsection