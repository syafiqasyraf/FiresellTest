@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users List</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Add New User</a>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $loop -> iteration}}</td>
                  <td>{{ $user -> name}}</td>
                  <td>{{ $user -> email}}</td>
                  <td>{{ $user -> role}}</td>
                  <td>
                        <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning text-dark">
                        <span data-feather="edit"></span> EDIT</a>

                        <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0 text-dark" onclick="return confirm('Are you sure?')">
                          <span data-feather="x-circle"></span> DELETE</button>
                        </form>
                        
                        
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $users->links() }}
          </div>
@endsection