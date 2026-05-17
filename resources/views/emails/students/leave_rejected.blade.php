<x-mail::message>
# Leave Request Update

Dear **{{ $student->full_name }}**,

Your leave request from **{{ $leaveRequest->start_date->format('M d') }}** to **{{ $leaveRequest->end_date->format('M d, Y') }}** has been reviewed.

Unfortunately, your request has been **Rejected** at this time.

**Reason for Rejection:**
> {{ $leaveRequest->rejection_reason }}

If you have further questions or need to clarify details, please visit the hostel administration office.

<x-mail::button :url="url('/student/leave')">
View My Requests
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} Administration
</x-mail::message>
