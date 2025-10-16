<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'RetinaCare') }} - Contact</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen bg-[#0a0a0f] bg-gradient-to-b from-slate-950 via-[#14122a] to-[#1f1b3a] text-slate-100 antialiased">
    @include('layouts.navigation')

    <main class="relative">
      <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-24 left-1/4 h-80 w-80 rounded-full bg-blue-500/20 blur-3xl"></div>
        <div class="absolute bottom-0 right-1/5 h-96 w-96 rounded-full bg-indigo-500/10 blur-3xl"></div>
      </div>

      <section class="relative px-6 pb-16 pt-28 lg:px-8">
        <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
          <div>
            <span class="inline-flex items-center gap-2 rounded-full bg-white/5 px-4 py-1 text-xs uppercase tracking-[0.2em] text-blue-200 ring-1 ring-white/10">
              {{ __('We would love to hear from you') }}
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-5xl">
              {{ __('Get in touch with the RetinaCare team') }}
            </h1>
            <p class="mt-5 text-lg text-slate-300">
              {{ __('Whether you have questions about our AI screening platform, need implementation support, or want to partner with us, our specialists are ready to help you move forward.') }}
            </p>

            <div class="mt-10 grid gap-6 sm:grid-cols-2">
              <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-slate-950/30 backdrop-blur">
                <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500/20 text-blue-300">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.5a2.25 2.25 0 01-2.26 0l-7.5-4.5A2.25 2.25 0 012.25 6.993V6.75" />
                  </svg>
                </span>
                <h2 class="mt-4 text-xl font-semibold text-white">{{ __('Email us') }}</h2>
                <p class="mt-2 text-sm text-slate-300">{{ __('Our support team responds within one business day.') }}</p>
                <a href="mailto:support@retinacare.ai" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-blue-300 hover:text-blue-200">
                  support@retinacare.ai
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L21 10.5m0 0L17.25 14.25M21 10.5H3" />
                  </svg>
                </a>
              </div>

              <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-slate-950/30 backdrop-blur">
                <span class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/20 text-indigo-300">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75A2.25 2.25 0 014.5 4.5h2.25c.414 0 .75.336.75.75v3a.75.75 0 01-.75.75H4.5v1.5c0 5.107 4.143 9.25 9.25 9.25h1.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a2.25 2.25 0 01-2.25 2.25H16.5C9.596 21.75 3.75 15.904 3.75 9V6.75h-1.5a.75.75 0 01-.75-.75z" />
                  </svg>
                </span>
                <h2 class="mt-4 text-xl font-semibold text-white">{{ __('Call us') }}</h2>
                <p class="mt-2 text-sm text-slate-300">{{ __('Monday to Friday - 8:00 AM to 6:00 PM (EAT)') }}</p>
                <a href="tel:+254700123456" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-blue-300 hover:text-blue-200">
                  +254 700 123 456
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L21 10.5m0 0L17.25 14.25M21 10.5H3" />
                  </svg>
                </a>
              </div>

              <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-slate-950/30 backdrop-blur sm:col-span-2">
                <span class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-500/20 text-purple-300">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a8.25 8.25 0 100-16.5 8.25 8.25 0 000 16.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v4.125l2.25 2.25" />
                  </svg>
                </span>
                <h2 class="mt-4 text-xl font-semibold text-white">{{ __('Office hours and address') }}</h2>
                <p class="mt-2 text-sm text-slate-300">{{ __('Visit our Nairobi lab where our clinical research and machine learning teams collaborate to build RetinaCare.') }}</p>
                <div class="mt-4 text-sm text-slate-200">
                  <p>RetinaCare Labs</p>
                  <p>Kilimani, Nairobi, Kenya</p>
                  <p class="mt-1">Weekdays - 9:00 AM to 5:00 PM</p>
                </div>
              </div>
            </div>
          </div>

          <div class="relative">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-slate-950/40 backdrop-blur">
              @if (session('status'))
                <div class="mb-6 rounded-xl border border-emerald-400/40 bg-emerald-600/10 px-4 py-3 text-sm text-emerald-200">
                  {{ session('status') }}
                </div>
              @endif

              @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-400/40 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                  {{ __('Please correct the highlighted fields and try again.') }}
                </div>
              @endif

              <h2 class="text-2xl font-semibold text-white">{{ __('Send us a message') }}</h2>
              <p class="mt-2 text-sm text-slate-300">{{ __('Fill out the form and we will get back to you within 24 hours.') }}</p>

              <form method="POST" action="{{ route('contact.store') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                  <label for="name" class="text-sm font-medium text-slate-200">{{ __('Full name') }}</label>
                  <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Jane Doe" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500/60" />
                  @error('name')
                    <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                  @enderror
                </div>

                <div>
                  <label for="email" class="text-sm font-medium text-slate-200">{{ __('Email address') }}</label>
                  <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500/60" />
                  @error('email')
                    <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                  @enderror
                </div>

                <div>
                  <label for="organization" class="text-sm font-medium text-slate-200">{{ __('Organization') }}</label>
                  <input id="organization" name="organization" type="text" value="{{ old('organization') }}" placeholder="Clinic or hospital name" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500/60" />
                  @error('organization')
                    <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                  @enderror
                </div>

                <div>
                  <label for="message" class="text-sm font-medium text-slate-200">{{ __('How can we help?') }}</label>
                  <textarea id="message" name="message" rows="4" placeholder="Share as many details as you can about your question." class="mt-2 w-full rounded-xl border border-white/10 bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500/60">{{ old('message') }}</textarea>
                  @error('message')
                    <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                  @enderror
                </div>

                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-700/40 transition hover:from-blue-400 hover:via-indigo-400 hover:to-purple-400">
                  {{ __('Submit message') }}
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0-6-6m6 6-6 6" />
                  </svg>
                </button>
              </form>

              <p class="mt-6 text-xs text-slate-400">
                {{ __('By submitting this form you agree to be contacted by RetinaCare about products, services and updates. You can unsubscribe at any time.') }}
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="relative px-6 pb-20 lg:px-8">
        <div class="mx-auto max-w-6xl rounded-3xl border border-white/10 bg-white/5 p-10 shadow-2xl shadow-slate-950/40 backdrop-blur">
          <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
            <div>
              <h2 class="text-2xl font-semibold text-white">{{ __('Visit our experience center') }}</h2>
              <p class="mt-3 text-sm text-slate-300">{{ __('Schedule a private demo of our screening workflow, integrations, and clinical reporting dashboard. We host in-person sessions every Wednesday afternoon.') }}</p>
              <div class="mt-6 space-y-2 text-sm text-slate-200">
                <p><span class="font-semibold text-blue-200">{{ __('Guided demos:') }}</span> {{ __('Wednesdays - 2:00 PM to 4:00 PM') }}</p>
                <p><span class="font-semibold text-blue-200">{{ __('Location:') }}</span> {{ __('RetinaCare HQ, Nairobi') }}</p>
                <p><span class="font-semibold text-blue-200">{{ __('RSVP:') }}</span> <a href="mailto:events@retinacare.ai" class="text-blue-300 hover:text-blue-200">events@retinacare.ai</a></p>
              </div>
            </div>

            <div class="relative h-72 overflow-hidden rounded-2xl border border-white/10 bg-slate-900/60">
              <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(99,102,241,0.35),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(56,189,248,0.25),_transparent_55%)]"></div>
              <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
                <svg class="h-16 w-16 text-blue-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c4.287 0 7.5-3.316 7.5-8.25C19.5 7.043 16.164 3 12 3S4.5 7.043 4.5 12.75C4.5 17.684 7.713 21 12 21z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12h19.5M12 3v9" />
                </svg>
                <p class="mt-4 max-w-xs text-sm text-slate-200">{{ __('Interactive map coming soon. For now, reach out and we will share directions tailored to your visit.') }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>

