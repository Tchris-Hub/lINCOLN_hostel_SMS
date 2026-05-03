@extends('layouts.student')

@section('page-title', 'Student Directory')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Room Directory</h5>
    </div>
    <div class="card-body">
        @if($students->isEmpty())
            <p class="text-muted mb-0">No directory entries available yet.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Admission #</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Intake</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $entry)
                            <tr>
                                <td>{{ $entry->full_name }}</td>
                                <td>{{ $entry->admission_number }}</td>
                                <td>{{ $entry->department }}</td>
                                <td>{{ $entry->semester }}</td>
                                <td>{{ $entry->intake }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
