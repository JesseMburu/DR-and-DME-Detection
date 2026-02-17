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

    <div class="mt-8 space-y-4">
        <div class="relative flex items-center justify-center">
            <span class="px-3 text-xs uppercase tracking-[0.3em] text-slate-400">{{ __('or continue with') }}</span>
        </div>

        <a href="{{ route('oauth.github.redirect') }}" class="inline-flex w-full items-center justify-center gap-3 rounded-lg border border-white/20 px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12 1.5C6.201 1.5 1.5 6.201 1.5 12c0 4.65 3.015 8.59 7.202 9.985.526.097.717-.228.717-.506 0-.25-.01-1.08-.015-1.958-2.932.637-3.552-1.253-3.552-1.253-.48-1.22-1.173-1.545-1.173-1.545-.959-.656.073-.643.073-.643 1.061.074 1.619 1.09 1.619 1.09.942 1.614 2.471 1.148 3.072.877.095-.682.369-1.148.672-1.413-2.34-.267-4.8-1.17-4.8-5.204 0-1.148.41-2.088 1.082-2.824-.108-.266-.469-1.337.102-2.783 0 0 .882-.282 2.892 1.079a10.07 10.07 0 0 1 2.632-.354 10.07 10.07 0 0 1 2.632.354c2.01-1.36 2.89-1.079 2.89-1.079.572 1.446.21 2.517.103 2.783.673.736 1.08 1.676 1.08 2.824 0 4.045-2.465 4.934-4.812 5.195.38.327.72.97.72 1.955 0 1.41-.013 2.546-.013 2.893 0 .281.19.609.723.505C19.49 20.586 22.5 16.648 22.5 12c0-5.799-4.701-10.5-10.5-10.5Z" clip-rule="evenodd" />
            {{ __('Continue with GitHub') }}
        </a>
    </div>

    <p class="mt-6 text-center text-sm text-slate-300">
        {{ __('Already registered?') }}
        <a href="{{ route('login') }}" class="font-semibold text-blue-400 hover:text-blue-300">{{ __('Sign in') }}</a>
    </p>
@endsection
