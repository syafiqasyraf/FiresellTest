@extends('dashboard.layouts.main')

@section('container')
<h3 class="mt-4 mb-4">Todos: {{ $todos->message }} </h3>


<div>
  <strong>Todos</strong><p>{{ $todos->message }}</p>
  <strong>By</strong><p>{{ $todos->user->name }}</p>
  <strong>Status</strong>
  <div>
    @if ($todos->is_complete == 0)
    <p class="text-danger">Incomplete</p>
    @else
    <p class="text-success">Completed</p>
    @endif
  </div>
</div><hr>

<h4>Images</h4>

@if($todos->fileupload)
  <div class="table-responsive col-lg-10 mt-3">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Image</th>
          <th>Extension</th>
          <th>Size</th>
          <th>Path</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($todos->fileupload as $fileupload)
          <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $fileupload->name }}</td>
            <td>
              @if ($fileupload->path)
                <div style="max-height: 350px; overflow:hidden;">
                  <img src="{{ asset('storage/' .$fileupload->path) }}" alt="{{ $fileupload->name }}"
                    class="img-fluid col-sm-3">
                </div>
              @else
                <Strong>Tiada gambar.</Strong>
              @endif
            </td>
            <td>{{ $fileupload->extension }}</td>
            <td>{{ $fileupload->size }}</td>
            <td>{{ $fileupload->path }}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@else
  <p>Tiada gambar.</p>
@endif

<a href="/dashboard/todos" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
@endsection