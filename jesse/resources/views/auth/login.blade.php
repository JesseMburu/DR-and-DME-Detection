@extends('layouts.guest')

@section('title', config('app.name').' - Login')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Log in') }}</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-200" />
            <x-text-input id="email" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-200" />
            <x-text-input id="password" class="block mt-2 w-full bg-slate-800/60 border-0 text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-lg" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-slate-800/60 text-blue-500 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-slate-300 hover:text-white" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm text-slate-300">
        {{ __('Need an account?') }}
        <a href="{{ route('register') }}" class="font-semibold text-blue-400 hover:text-blue-300">
            {{ __('Create one') }}
        </a>
    </p>
@endsection
