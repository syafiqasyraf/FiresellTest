@extends('dashboard.layouts.main')

@section('container')
<h3 class="mt-4 mb-4">Todos Name: {{ ucwords($todos->message) }} </h3>

<strong>Created By</strong><p>{{ $todos->user->name }}</p>
<strong>Status</strong>
<div>
  @if ($todos->is_complete == 0)
  <p class="text-danger">Incomplete</p>
  @else
  <p class="text-success">Completed</p>
  @endif
</div><hr>

<h4>Images</h4>

@if(count($todos->fileupload) >= 1)
  <div class="table-responsive mt-3">
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
            <td>{{ ucwords($fileupload->name) }}</td>
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
    {{ $fileuploads->links() }}
  </div>
@else
  <p>No image.</p>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <div>
     <a href="/dashboard/fileupload/create?id={{ $todos->id }}" class="btn btn-primary text-light">Add Image</a>
     <!-- <input type="hidden" id="todo_id" name="todo_id" value="{{ $todos->id }}"> -->
  </div>
  <a href="/dashboard/todos" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
</div>
@endsection