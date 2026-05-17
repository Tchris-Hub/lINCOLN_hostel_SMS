<x-mail::message>
# Payment Received! 💳

Dear {{ $payment->student->full_name }},

We have received your payment of **₦{{ number_format($payment->amount, 2) }}**.

**Payment Details:**
- **Amount:** ₦{{ number_format($payment->amount, 2) }}
- **Receipt Number:** {{ $payment->receipt_number }}
- **Method:** {{ str_replace('_', ' ', ucfirst($payment->payment_method)) }}

Our administrative team is now verifying your payment. You will be notified once it has been approved.

<x-mail::button :url="route('student.dashboard')">
View My Dashboard
</x-mail::button>

If you have any questions, please contact the hostel management office.

Thanks,<br>
{{ config('app.name') }} Finance Team
</x-mail::message>
