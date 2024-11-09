<x-mail::message>
# Transaction Alert Notification

Dear Customer,

We would like to notify you of a recent transaction on your account:

---

<x-mail::panel>
| Transaction Detail | Description |
|--------------------|-------------|
| **Type**           | {{ ucfirst($transaction->type) }} |
| **Amount**         | {{ money(abs($transaction->amount), $transaction->wallet->currency) }} |
| **Date**           | {{ $transaction->created_at->format('jS M Y') }} |
| **Available Balance** | {{ money(abs($transaction->wallet->balance), $transaction->wallet->currency) }} |
</x-mail::panel>

If you did not authorize this transaction or have any concerns, please contact our support team immediately at <a
    href="mailto:{{config('mail.from.address')}}">{{config('mail.from.address')}}</a>.

Thank you for choosing {{config('app.name')}}.

Best regards,
**{{config('app.name')}} Team**

---
</x-mail::message>
