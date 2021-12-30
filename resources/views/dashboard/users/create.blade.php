@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New User</h1>
    </div>

    <div class='col-lg-8'>
        <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" 
            name="name" required value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
             name="email" required value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password"
             name="password" >
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-2">
            <div >
                <p>Select role :</p>
                <input type="radio" id="user" name="role" value="user" checked >
                <label for="user" >User</label><br>
                <input type="radio" id="admin" name="role" value="admin">
                <label for="admin" >Admin</label>
            </div>
            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="/dashboard/users" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection