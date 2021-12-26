@extends('dashboard.layouts.main')

@section('container')
<h3 class="mt-4 mb-4">Todos: {{ $todos->message }} </h3>

<div class="card mb-5" style="width: 60rem;height: auto;">
  <div class="card-body ">
    <h5 class="card-title">Images</h5>
      @if ($todos->image)
        <div style="max-height: 350px; overflow:hidden;">
          <img src="{{ asset('storage/' .$todos->image) }}" alt="{{ $todos->id }}"
            class="img-fluid col-sm-3">
        </div>
      @else
        <Strong>Tiada gambar.</Strong>
      @endif
  </div>
</div>
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
</div>

<a href="/dashboard/todos" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
@endsection