@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Users</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/users/{{ $users->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
            name="name" required value="{{ old('name', $users->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                name="email" required value="{{ old('email', $users->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
                name="password" required value="{{ old('password', $users->password) }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <div >
                    <p>Select role :</p>
                    @if ($users->role =='user')
                        <input class="@error('user') is-invalid @enderror" type="radio" id="user" name="role" 
                        value="{{ old('role', $users->role) }}" checked>
                        <label for="user" >User</label><br>
                        <input class="@error('admin') is-invalid @enderror" type="radio" id="admin" name="role" 
                        value="{{ old('role', $users->role) }}">
                        <label for="admin" >Admin</label>

                    @else
                        <input class="@error('user') is-invalid @enderror" type="radio" id="user" name="role" 
                        value="user">
                        <label for="user" >User</label><br>
                        <input class="@error('admin') is-invalid @enderror" type="radio" id="admin" name="role" 
                        value="admin" checked>
                        <label for="admin" >Admin</label>

                    @endif
                </div>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dashboard/users" class="btn btn-danger">Batal</a>

        </form>
    </div>
@endsection