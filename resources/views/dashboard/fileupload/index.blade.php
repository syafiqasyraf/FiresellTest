@extends('dashboard.layouts.main')

@section('container')
<h3 class="mt-4 mb-4">File Uploads </h3>

<a href="/dashboard/fileupload/create" class="btn btn-primary mb-3">Upload File</a>
<div class="table-responsive col-lg-10 mt-3">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Extension</th>
        <th>Size</th>
        <th>Path</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fileupload as $fileupload)
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

@endsection