@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ToDo Lists</h1>

    </div>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/dashboard/todos/create" class="btn btn-primary mb-3">New ToDo</a>
        <a href="/dashboard/fileupload/create" class="btn btn-info mb-3 text-light">Add Image</a>
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ToDos</th>
                  <th>Person</th>
                  <th>Status</th>
                  <th>Mark as Complete</th>
                  <th></th>
                </tr>
              </thead>
              <tbody >
                @foreach ($todos as $todos)
                <tr>
                  <td>{{ $loop -> iteration}}</td>
                  <td>
                    <a href="/dashboard/todos/{{ $todos->id }}" class="text-dark" style="text-decoration:none">
                    {{ $todos -> message}}</a>
                  </td>
                  <td>{{ $todos->user->name }}</td>
                  <td>
                    @if ($todos->is_complete == 0)
                      <p class="text-danger">Incomplete</p>
                    @else
                    <p class="text-success">Completed</p>
                    @endif
                  </td>
                  <td>
                      <form method="post" action="/dashboard/todos/{{ $todos->id }}" class="d-inline">
                          @method('put')
                          @csrf
                          <input type="hidden" id="is_complete" name="is_complete" value=1>
                          <button class="badge bg-dark border-0" onclick="return confirm('Anda pasti?')">
                          <span data-feather="check"></span></button>
                      </form>
                  </td>
                  <td>
                        <!-- <a href="/dashboard/fileupload/create" class="badge bg-info text-dark">
                        <span data-feather="edit"></span> ADD IMAGE</a> -->
                        <a href="/dashboard/todos/{{ $todos->id }}/edit" class="badge bg-warning text-dark">
                        <span data-feather="edit"></span> EDIT</a>

                        <form action="/dashboard/todos/{{ $todos->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0 text-dark" onclick="return confirm('Anda pasti?')">
                          <span data-feather="x-circle"></span> DELETE</button>
                        </form>
                        
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
@endsection