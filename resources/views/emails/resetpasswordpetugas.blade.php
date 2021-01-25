@component('mail::message')
    # Reset Password Admin

    Hai {{ $data->name }}
    Password Anda Sudah Direset dengan Password Default Baru adalah rahasiakita

    Terima Kasih,
    {{ config('app.name') }}
@endcomponent
