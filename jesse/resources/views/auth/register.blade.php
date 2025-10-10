@extends('layouts.guest')

@section('title', config('app.name').' - Register')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Register') }}</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Full Name')" class="text-gray-200" />
            <x-text-input id="name" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-200" />
            <x-text-input id="email" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-200" />
            <x-text-input id="password" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-200" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-500">{{ __('Register') }}</x-primary-button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm text-slate-300">
        {{ __('Already registered?') }}
        <a href="{{ route('login') }}" class="font-semibold text-blue-400 hover:text-blue-300">{{ __('Sign in') }}</a>
    </p>
@endsection
