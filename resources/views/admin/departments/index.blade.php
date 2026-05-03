@extends('layouts.admin')
@section('page-title', 'Departments')
@section('content')
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white"><h5 class="mb-0">Departments</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.departments.store') }}" class="row g-2 mb-4">
      @csrf
      <div class="col-md-6"><input name="name" class="form-control" placeholder="Department name" required></div>
      <div class="col-md-3"><input name="sort_order" type="number" min="0" class="form-control" placeholder="Sort order"></div>
      <div class="col-md-3"><button class="btn btn-primary w-100">Add Department</button></div>
    </form>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead><tr><th>Name</th><th>Sort</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse($departments as $department)
          <tr>
            <form method="POST" action="{{ route('admin.departments.update', $department) }}">
              @csrf @method('PUT')
              <td><input name="name" class="form-control" value="{{ $department->name }}" required></td>
              <td><input name="sort_order" type="number" min="0" class="form-control" value="{{ $department->sort_order }}"></td>
              <td><input type="checkbox" name="is_active" value="1" {{ $department->is_active ? 'checked' : '' }}></td>
              <td class="d-flex gap-2">
                <button class="btn btn-sm btn-success">Save</button>
            </form>
            <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" onsubmit="return confirm('Delete department?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
              </td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-center text-muted">No departments found.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
