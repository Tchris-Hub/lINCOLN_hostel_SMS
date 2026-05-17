<x-mail::message>
# Application Received! 📝

Dear {{ $application->full_name }},

Thank you for choosing LincHostel! We have successfully received your application for the **{{ $application->academic_year }}** academic session.

**Application Summary:**
- **Application ID:** {{ $application->application_number }}
- **Program:** {{ $application->program }}
- **Department:** {{ $application->department }}

Our administrative team is now reviewing your documents and payment receipt. We will process your application as soon as possible and you will receive another email once a decision has been made.

<x-mail::button :url="route('home')">
Visit Website
</x-mail::button>

If you have any urgent questions, please feel free to reply to this email or visit our office.

Thanks,<br>
{{ config('app.name') }} Admissions Team
</x-mail::message>
