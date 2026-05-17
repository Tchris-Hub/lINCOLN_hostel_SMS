<x-mail::message>
# Leave Request Submitted

@if($recipientType === 'admin')
# New Leave Request Notification
@else
# Your Ward's Leave Request Notification
@endif

Dear {{ $recipientType === 'admin' ? 'Administrator' : ($student->parent_name ?? 'Parent/Guardian') }},

We wish to inform you that a new leave request has been submitted by **{{ $student->full_name }}**.

**Leave Request Summary:**
- **Student:** {{ $student->full_name }} ({{ $student->admission_number }})
- **Type:** {{ ucfirst($leaveRequest->type) }}
- **Dates:** {{ $leaveRequest->start_date->format('M d') }} to {{ $leaveRequest->end_date->format('M d, Y') }}
- **Reason:** {{ $leaveRequest->reason }}
- **Destination:** {{ $leaveRequest->destination ?: 'Not Specified' }}

@if($recipientType === 'admin')
Please review this request in the admin dashboard to approve or reject it.

<x-mail::button :url="url('/admin/leave/' . $leaveRequest->id)">
Review Request
</x-mail::button>
@else
The hostel administration is currently reviewing this request. You will receive another notification once a decision has been made.
@endif

Thanks,<br>
{{ config('app.name') }} Management
</x-mail::message>
