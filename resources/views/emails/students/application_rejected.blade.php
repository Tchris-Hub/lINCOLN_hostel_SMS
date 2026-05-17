<x-mail::message>
# Application Status Update

Dear {{ $application->full_name }},

Thank you for your interest in LincHostel. We have completed the review of your application (**{{ $application->application_number }}**).

Unfortunately, we are unable to approve your application at this time for the following reason:

**Reason:**
> {{ $application->rejection_reason ?: 'Incomplete documentation or eligibility criteria not met.' }}

If you believe this was a mistake or would like to re-apply with corrected information, please contact our admissions office.

<x-mail::button :url="route('home')">
Visit Website
</x-mail::button>

We wish you the best in your academic journey.

Thanks,<br>
{{ config('app.name') }} Admissions Team
</x-mail::message>
