<x-mail::message>
# Leave Request Approved! ✅

@if($recipientType === 'student')
Dear **{{ $student->full_name }}**,
@else
Dear **{{ $student->parent_name ?? 'Parent/Guardian' }}**,
@endif

We wish to inform you that the leave request for **{{ $student->full_name }}** has been **Approved**.

**Leave Details:**
- **Type:** {{ ucfirst($leaveRequest->type) }}
- **Period:** {{ $leaveRequest->start_date->format('M d') }} to {{ $leaveRequest->end_date->format('M d, Y') }}
- **Destination:** {{ $leaveRequest->destination ?: 'Not Specified' }}
- **Reason:** {{ $leaveRequest->reason }}

@if($recipientType === 'student')
**Important Instructions:**
1. Please ensure you check out at the security desk before leaving.
2. You are expected back on or before **{{ $leaveRequest->end_date->format('M d, Y') }}**.
3. Keep this email as a reference for your approval.

<x-mail::button :url="url('/student/leave')">
View Leave History
</x-mail::button>
@else
We have notified the student of this approval and the expected return date. Thank you for your cooperation with the LincHostel management.
@endif

Thanks,<br>
{{ config('app.name') }} Administration
</x-mail::message>
