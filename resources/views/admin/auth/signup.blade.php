@extends('admin.auth.layout')
 

@section('title', __('auth.sign_in'))

@section('description',  __('auth.fill_informations'))

@section('content')

<form method="POST" action="{{ route('admin.auth.signin') }}">
    @csrf
    <div class="space-y-4 ">

        <x-input-text label="{{ __('auth.firstname') }}" name="firstname" type="text" rounded required autofocus old/>
        <x-input-text label="{{ __('auth.lastname') }}" name="lastname" type="text" rounded required old/>

        <x-input-text label="{{ __('auth.email') }}" name="email" type="email" rounded required old/>

        <x-input-text label="{{ __('auth.password') }}" type="password" name="password" rounded required />
        <x-input-text label="{{ __('auth.password_confirmation') }}" type="password" name="password_confirmation" rounded required />
 

        <x-g-recaptcha />

        <x-button color="primary" semibold rounded block>{{__('auth.create_account')}}</x-button>
 
        <div>
            <div class="text-sm text-center text-slate-400">{{__('auth.has_account')}}</div> 
            <x-button tag="a" href="{{ route('admin.auth.signin') }}" color="theme" semibold rounded block>{{__('auth.sign_in')}}</x-button>
        </div>
    </div>
</form>


@endsection
