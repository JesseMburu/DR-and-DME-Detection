<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'RetinaCare') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen bg-[#0a0a0f] bg-gradient-to-b from-slate-900 via-[#14122a] to-[#25224b] text-white antialiased">
    <div class="min-h-screen flex items-center justify-center p-6">
      <div class="w-full max-w-xl rounded-2xl bg-white/5 backdrop-blur-md ring-1 ring-white/10 shadow-2xl px-8 py-10 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Welcome to<br class="hidden md:block"> RetinaCare</h1>
        <p class="mt-4 text-base md:text-lg text-slate-300">AI-Powered Retina Disease Detection Platform</p>

        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
          <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-600 hover:bg-blue-500 transition-colors text-white font-semibold px-6 py-3 w-full sm:w-auto">Login</a>
          <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-lg border border-white/30 hover:bg-white/10 transition-colors text-white font-semibold px-6 py-3 w-full sm:w-auto">Create Account</a>
        </div>
      </div>
    </div>
  </body>
  </html>

