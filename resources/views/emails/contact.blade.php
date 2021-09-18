@component('mail::message')
    # Contact Requests

    Name :- {{ $contact->name }}
    Email :- {{ $contact->email }}
    Subject :- {{ $contact->subject }}
    Message :- {{ $contact->message }}


    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
