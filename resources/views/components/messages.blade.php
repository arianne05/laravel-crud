{{-- USING FLASH SESSION TO TEMPORARILY STORE DATA --}}

{{-- display the parameter passed by the logout function --}}
@if(session()->has('message'))
    <h1>{{session('message')}}</h1>
@endif