<x-mail::message>
# Room Booking Received 🏠

Dear {{ $payment->student->full_name }},

We have received your room booking request and payment receipt for Room **{{ $payment->room->room_number }}** in **{{ $payment->room->hostel->name }}**.

**Payment Details:**
- **Amount:** ₦{{ number_format($payment->amount, 2) }}
- **Receipt Number:** {{ $payment->receipt_number }}
- **Payment Plan:** {{ ucfirst($payment->payment_plan) }}

Our administrative team is currently verifying your payment receipt. You will receive another email as soon as your booking is approved and your room is officially assigned.

<x-mail::button :url="route('student.dashboard')">
View Dashboard
</x-mail::button>

If you have any questions, please contact the hostel management office.

Thanks,<br>
{{ config('app.name') }} Management
</x-mail::message>
