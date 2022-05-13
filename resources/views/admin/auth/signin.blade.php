@extends('admin.auth.layout')
 

@section('title', __('auth.sign_in'))

@section('description',  __('auth.fill_informations'))

@section('content')

<form method="POST" action="{{ route('admin.auth.signin') }}">
    @csrf
    <div class="space-y-4 ">

        <x-input-text label="{{ __('auth.email') }}" name="email" type="email" rounded required autofocus old/>

        <x-input-text label="{{ __('auth.password') }}" type="password" name="password" rounded required />
 

        @if (Route::has('admin.auth.password_request'))
        <a href="{{ route('admin.auth.password_request') }}" class="block text-sm font-semibold text-rose-500">{{__('auth.forgot_password')}}</a>
        @endif

        <x-button color="primary" semibold rounded block>{{__('auth.sign_in')}}</x-button>
 
        <div>
            <div class="text-sm text-center text-slate-400">{{__('auth.hasnt_account')}}</div> 
            <x-button tag="a" href="{{ route('admin.auth.signup') }}" color="theme" semibold rounded block>{{__('auth.create_account')}}</x-button>
        </div>
    </div>
</form>


@endsection
