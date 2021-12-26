@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Selamat Datang, {{ auth()->user()->name }}</h2>
        
    </div>

    <div class=" align-items-center pt-3 pb-2 mb-3">
        <strong >Nama</strong> <p>{{ auth()->user()->name }}</p>
        <strong >Email</strong> <p>{{ auth()->user()->email }}</p>
        <strong >Role</strong> <p>{{ auth()->user()->role }}</p>
        
    </div>
    
@endsection