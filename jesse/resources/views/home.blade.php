<x-app-layout>
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100">
        <div class="absolute inset-0 -z-10 opacity-60">
            <div class="absolute -top-40 right-0 h-80 w-80 rounded-full bg-blue-500/30 blur-3xl"></div>
            <div class="absolute -bottom-32 left-10 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-16 lg:py-20">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-blue-200 ring-1 ring-white/10">
                        <span class="h-2 w-2 animate-pulse rounded-full bg-blue-300"></span>
                        RetinaCare
                    </span>
                    <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-5xl">
                        Welcome back, {{ auth()->user()->name }}
                    </h1>
                    <p class="mt-4 text-lg text-slate-300">
                        Stay informed with tailored prevention guidance and treatment options so you can take confident steps toward protecting your vision.
                    </p>

                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <a href="{{ route('predict') }}" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-5 py-3 font-semibold text-white shadow-lg shadow-indigo-700/40 transition hover:from-blue-400 hover:via-indigo-400 hover:to-purple-400">
                            Predict Now
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0 0-3-3m3 3 3-3" />
                            </svg>
                        </a>
                        <a href="#preventions" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white shadow-lg shadow-blue-600/30 transition hover:bg-blue-500">
                            Prevention Tips
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0-6-6m6 6-6 6" />
                            </svg>
                        </a>
                        <a href="#treatments" class="inline-flex items-center gap-2 rounded-lg border border-white/20 px-5 py-3 font-semibold text-white transition hover:bg-white/10">
                            Treatment Options
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4">
                    <div class="rounded-3xl bg-white/10 p-6 ring-1 ring-white/10 shadow-xl shadow-indigo-900/30 backdrop-blur">
                        <h2 class="text-lg font-semibold text-white">Snapshot</h2>
                        <p class="mt-2 text-sm text-slate-300">Quick reminders to keep your retina health on track.</p>
                        <dl class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-gradient-to-br from-blue-500/20 via-transparent to-transparent p-4">
                                <dt class="text-sm text-slate-300">Optimal HbA1c</dt>
                                <dd class="mt-1 text-2xl font-semibold text-white">6.5%</dd>
                            </div>
                            <div class="rounded-2xl bg-gradient-to-br from-indigo-500/20 via-transparent to-transparent p-4">
                                <dt class="text-sm text-slate-300">Weekly Activity</dt>
                                <dd class="mt-1 text-2xl font-semibold text-white">150 min</dd>
                            </div>
                            <div class="rounded-2xl bg-gradient-to-br from-sky-500/20 via-transparent to-transparent p-4">
                                <dt class="text-sm text-slate-300">Blood Pressure Goal</dt>
                                <dd class="mt-1 text-2xl font-semibold text-white">≤ 130/80</dd>
                            </div>
                            <div class="rounded-2xl bg-gradient-to-br from-purple-500/20 via-transparent to-transparent p-4">
                                <dt class="text-sm text-slate-300">Next Screening</dt>
                                <dd class="mt-1 text-2xl font-semibold text-white">12 months</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="preventions" class="bg-slate-950 py-16 text-slate-100">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center">
                <span class="text-sm font-semibold uppercase tracking-widest text-blue-300">Proactive Care</span>
                <h3 class="mt-3 text-3xl font-bold">Preventions</h3>
                <p class="mt-4 text-slate-300">Adopt evidence-backed habits to slow down or prevent diabetic retinopathy progression.</p>
            </div>

            <div class="mt-10 space-y-5">
                <div x-data="{ open: true }" class="rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-black/20">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500/15 text-blue-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0115 0c0 4.125-3.375 7.875-7.5 9-4.125-1.125-7.5-4.875-7.5-9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Healthy Lifestyle</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-blue-200' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-200">
                        <p class="mb-3">Adopting lifestyle changes can reduce your risk of diabetic retinopathy. Recommended actions include:</p>
                        <ul class="space-y-2 text-sm text-slate-300">
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Eating a balanced diet low in salt, sugar, and unhealthy fats.</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Maintaining a healthy BMI (18.5–24.9).</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Exercising regularly (at least 150 minutes of moderate activity per week).</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Avoiding smoking and reducing alcohol intake.</li>
                        </ul>
                    </div>
                </div>

                <div x-data="{ open: false }" class="rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-black/20">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500/15 text-blue-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v6m0 0a3 3 0 110 6h-1.5M12 10.5H9m3-6a7.5 7.5 0 00-7.5 7.5 7.5 7.5 0 0015 0A7.5 7.5 0 0012 4.5z" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Know Your Blood Sugar</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-blue-200' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-200">
                        <p class="mb-3">Keep your glucose levels under control to prevent retina damage. Ideal targets:</p>
                        <ul class="space-y-2 text-sm text-slate-300">
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Home monitoring: 4 to 10 mmol/l.</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Long-term HbA1c goal: around 48 mmol/mol (6.5%).</li>
                        </ul>
                        <p class="mt-3 text-sm">Consult your doctor regularly for dosage adjustments.</p>
                    </div>
                </div>

                <div x-data="{ open: false }" class="rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-black/20">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500/15 text-blue-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 17.25l3-3m0 0l3 3m-3-3V6.75m12 0l-3 3m0 0l-3-3m3 3v10.5" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Know Your Blood Pressure</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-blue-200' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-200">
                        <p class="mb-3">High blood pressure accelerates retina damage. Recommended levels:</p>
                        <ul class="space-y-2 text-sm text-slate-300">
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> General target: ≤ 140/80 mmHg</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> If complications exist: ≤ 130/80 mmHg</li>
                        </ul>
                        <p class="mt-3 text-sm">Use home BP monitors or get checked regularly at your clinic.</p>
                    </div>
                </div>

                <div x-data="{ open: false }" class="rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-black/20">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500/15 text-blue-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5h7.5m-7.5 3h7.5M5.25 8.25h13.5M9 12h6m-9 3h12m-9 3h6" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Regular Screening</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-blue-200' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-200">
                        <p class="mb-3">Even if your vision seems fine, silent damage may occur. Schedule annual retina screening and seek help immediately if you notice:</p>
                        <ul class="space-y-2 text-sm text-slate-300">
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Vision loss or blurring</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Floating shapes or flashes of light</li>
                            <li class="flex gap-2"><span class="mt-1 h-1.5 w-1.5 rounded-full bg-blue-300"></span> Eye redness or pain</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="treatments" class="bg-white py-16">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center">
                <span class="text-sm font-semibold uppercase tracking-widest text-indigo-500">Next Steps</span>
                <h3 class="mt-3 text-3xl font-bold text-slate-900">Treatment Options</h3>
                <p class="mt-4 text-slate-600">Explore clinically proven pathways that specialists rely on once signs of retinopathy appear.</p>
            </div>

            <div class="mt-10 space-y-5">
                <div x-data="{ open: true }" class="rounded-2xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4 text-slate-800">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75c1.148 0 2.25.285 3.195.81a3.755 3.755 0 011.68 2.045c.17.482.267.99.267 1.512 0 .523-.097 1.03-.267 1.512-.289.82-.82 1.533-1.68 2.045A6.75 6.75 0 1112 6.75z" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Management</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-indigo-500' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-600">
                        <p>Managing blood sugar, cholesterol, and blood pressure is the first line of defense against vision loss. Proper medication and diet can prevent progression.</p>
                    </div>
                </div>

                <div x-data="{ open: false }" class="rounded-2xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4 text-slate-800">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v6m0 0a3 3 0 110 6H9.75m2.25-6H9m3-6a7.5 7.5 0 00-7.5 7.5 7.5 7.5 0 0015 0A7.5 7.5 0 0012 4.5z" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Injections &amp; Laser Therapy</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-indigo-500' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-600 space-y-3">
                        <p>Anti-VEGF injections and laser photocoagulation can seal leaking blood vessels and reduce swelling.</p>
                        <p>Most effective when detected early.</p>
                    </div>
                </div>

                <div x-data="{ open: false }" class="rounded-2xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" @click="open = ! open" class="flex w-full items-center justify-between px-6 py-4 text-left">
                        <span class="flex items-center gap-4 text-slate-800">
                            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5m-16.5 5.25h9m-9 5.25h16.5" />
                                </svg>
                            </span>
                            <span class="text-lg font-semibold">Surgery (Vitrectomy)</span>
                        </span>
                        <svg :class="open ? 'rotate-180 text-indigo-500' : 'text-slate-400'" class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 text-slate-600 space-y-3">
                        <p>For advanced stages, surgery may be needed to remove scar tissue or blood from inside the eye.</p>
                        <p>Success rates are high when combined with early detection.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
