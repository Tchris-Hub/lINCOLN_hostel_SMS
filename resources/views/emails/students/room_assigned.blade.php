<x-mail::message>
# Welcome to Your New Room! 🎉

Dear {{ $student->full_name }},

Great news! Your room booking payment has been verified and your room is now officially assigned.

**Your Accommodation Details:**
- **Hostel:** {{ $room->hostel->name }}
- **Room Number:** {{ $room->room_number }}
- **Room Type:** {{ ucfirst($room->room_type) }}

You can now log in to your dashboard to view your roommates and check-in details.

<x-mail::button :url="route('student.dashboard')">
Go to Student Dashboard
</x-mail::button>

We look forward to having you with us. If you need any assistance during your move-in, please reach out to the hostel staff.

Thanks,<br>
{{ config('app.name') }} Management
</x-mail::message>
