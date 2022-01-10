@extends('dashboard.layouts.main')

@section('container')
<h3 class="mt-4 mb-4">All Images Uploaded </h3>

<div class="table-responsive col-lg-10 mt-3">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Image</th>
        <!-- <th>ToDo</th> -->
        <th>Extension</th>
        <th>Size</th>
        <th>Path</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fileupload as $fileuploads)
      <tr>
        <td>{{ ($fileupload ->currentpage()-1) * $fileupload ->perpage() + $loop->index + 1 }}</td>
        <td>{{ ucwords($fileuploads->name) }}</td>
        <td>
          @if ($fileuploads->path)
            <div style="max-height: 350px; overflow:hidden;">
              <img src="{{ asset('storage/' .$fileuploads->path) }}" alt="{{ $fileuploads->name }}"
                class="img-fluid col-sm-3">
            </div>
          @else
            <Strong>Tiada gambar.</Strong>
          @endif
        </td>
        <!-- <td>{{ $fileuploads->todos }}</td> -->
        <td>{{ $fileuploads->extension }}</td>
        <td>{{ $fileuploads->size }}</td>
        <td>{{ $fileuploads->path }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $fileupload->links() }}
</div>

@endsection