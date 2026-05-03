@extends('layouts.admin')
@section('page-title', 'Intakes')
@section('content')
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white"><h5 class="mb-0">Intakes</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.intakes.store') }}" class="row g-2 mb-4">
      @csrf
      <div class="col-md-3"><input name="name" class="form-control" placeholder="e.g. July 2026" required></div>
      <div class="col-md-2"><input type="date" name="start_date" class="form-control"></div>
      <div class="col-md-2"><input type="date" name="end_date" class="form-control"></div>
      <div class="col-md-2"><input name="sort_order" type="number" min="0" class="form-control" placeholder="Sort"></div>
      <div class="col-md-3"><button class="btn btn-primary w-100">Add Intake</button></div>
    </form>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead><tr><th>Name</th><th>Start</th><th>End</th><th>Sort</th><th>Active</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($intakes as $intake)
          <tr>
            <form method="POST" action="{{ route('admin.intakes.update', $intake) }}">
              @csrf @method('PUT')
              <td><input name="name" class="form-control" value="{{ $intake->name }}" required></td>
              <td><input type="date" name="start_date" class="form-control" value="{{ optional($intake->start_date)->format('Y-m-d') }}"></td>
              <td><input type="date" name="end_date" class="form-control" value="{{ optional($intake->end_date)->format('Y-m-d') }}"></td>
              <td><input name="sort_order" type="number" min="0" class="form-control" value="{{ $intake->sort_order }}"></td>
              <td><input type="checkbox" name="is_active" value="1" {{ $intake->is_active ? 'checked' : '' }}></td>
              <td class="d-flex gap-2">
                <button class="btn btn-sm btn-success">Save</button>
            </form>
            <form method="POST" action="{{ route('admin.intakes.destroy', $intake) }}" onsubmit="return confirm('Delete intake?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
              </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">No intakes found.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
