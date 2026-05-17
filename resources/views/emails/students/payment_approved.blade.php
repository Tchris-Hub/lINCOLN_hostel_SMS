<x-mail::message>
# Payment Approved! ✅

Dear {{ $payment->student->full_name }},

We are pleased to inform you that your payment of **₦{{ number_format($payment->amount, 2) }}** has been successfully verified and approved.

**Approved Transaction Summary:**
- **Amount:** ₦{{ number_format($payment->amount, 2) }}
- **Receipt Number:** {{ $payment->receipt_number }}
- **Status:** Completed
- **Approval Date:** {{ now()->format('M d, Y') }}

This payment has been credited to your account. You can view your updated payment history in the student dashboard.

<x-mail::button :url="route('student.dashboard')">
View Payment History
</x-mail::button>

Thank you for your prompt payment.

Thanks,<br>
{{ config('app.name') }} Finance Team
</x-mail::message>
