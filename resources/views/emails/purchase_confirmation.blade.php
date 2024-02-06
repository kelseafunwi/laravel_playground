@component('mail::message')
    # Purchase Confirmation

    - Name: {{ $purchase->first_name }}  {{ $purchase->last_name }}
    - Address: {{ $purchase->address }}
@endcomponent
