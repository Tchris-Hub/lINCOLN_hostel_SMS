<x-mail::message>
# Congratulations! 🎉

Dear {{ $application->full_name }},

We are pleased to inform you that your hostel application (**{{ $application->application_number }}**) has been **Approved**! 

You are now officially part of the LincHostel community. We have created a student account for you so you can manage your accommodation and payments.

**Your Login Credentials:**
- **URL:** [{{ route('login') }}]({{ route('login') }})
- **Username:** {{ $application->student_id }}
- **Default Password:** `welcome123`

*Please change your password immediately after your first login.*

**Next Steps:**
1. Log in to the Student Dashboard.
2. Browse available hostels.
3. Book your preferred room and upload your payment receipt.

<x-mail::button :url="route('login')">
Login to Dashboard
</x-mail::button>

We look forward to welcoming you to the hostel!

Thanks,<br>
{{ config('app.name') }} Admissions Team
</x-mail::message>
