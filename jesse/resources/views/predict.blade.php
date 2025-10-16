<x-app-layout>
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100">
        <div class="absolute inset-0 -z-10 opacity-50">
            <div class="absolute -top-32 left-12 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-20 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div class="space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1 text-sm font-semibold text-blue-200 ring-1 ring-white/15">AI-Assisted Screening</span>
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">Predict Retinopathy in Seconds</h1>
                    <p class="text-lg text-slate-300">
                        Upload a retina fundus image to receive an instant AI prediction for diabetic retinopathy and macular edema risk.
                        Our model highlights concerning patterns so you can schedule timely consultations.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#upload" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-6 py-3 font-semibold text-white shadow-lg shadow-indigo-700/40 transition hover:from-blue-400 hover:via-indigo-400 hover:to-purple-400">
                            Upload Image
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V7.5m0 0L8.25 11.25M12 7.5l3.75 3.75M4.5 18.75h15" />
                            </svg>
                        </a>
                        <a href="#how-it-works" class="inline-flex items-center gap-2 rounded-lg border border-white/20 px-6 py-3 font-semibold text-white transition hover:bg-white/10">
                            How it works
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9A3.75 3.75 0 1112 5.25" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v.375c0 .621.126 1.236.369 1.809l.34.794a3 3 0 01-.794 3.348L12 19.5m0 0h4.5m-4.5 0H7.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div id="upload" class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/40 backdrop-blur">
                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-6">
                        @if (session('status'))
                            <div class="mb-4 rounded-xl border border-emerald-400/40 bg-emerald-600/10 px-4 py-3 text-sm text-emerald-200">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->has('predict'))
                            <div class="mb-4 rounded-xl border border-red-400/40 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                                {{ $errors->first('predict') }}
                            </div>
                        @endif

                        <h2 class="text-xl font-semibold text-white">Upload a retina image</h2>
                        <p class="mt-2 text-sm text-slate-300">Supported formats: JPG, PNG, BMP (max 5MB). High quality scans yield better predictions.</p>

                        <form method="POST" action="{{ route('predict.store') }}" enctype="multipart/form-data" class="mt-6 space-y-5">
                            @csrf
                            <div>
                                <label for="image" class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-white/20 bg-slate-900/40 px-6 py-10 text-center transition hover:border-blue-400 hover:bg-slate-900/60">
                                    <svg class="h-12 w-12 text-blue-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 15.75v-7.5A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v7.5A2.25 2.25 0 0118.75 18H5.25A2.25 2.25 0 013 15.75z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l6.75 4.5a2.25 2.25 0 002.5 0L21 9" />
                                    </svg>
                                    <span class="mt-3 text-sm font-semibold text-white">Drop your image here or click to browse</span>
                                    <span class="mt-1 text-xs text-slate-400">Choose a clear fundus photograph without reflections or blur.</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="hidden" required>
                                </label>
                                @error('image')
                                    <p class="mt-2 text-xs text-red-300">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-700/40 transition hover:from-blue-400 hover:via-indigo-400 hover:to-purple-400">
                                {{ __('Run prediction') }}
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0-6-6m6 6-6 6" />
                                </svg>
                            </button>
                        </form>

                        <div class="mt-6 rounded-xl border border-white/10 bg-slate-900/40 p-4 text-sm text-slate-300">
                            <p class="font-semibold text-white">Need help?</p>
                            <p class="mt-1">Review our capture checklist to avoid motion blur, poor focus, or occlusions. Accurate inputs yield actionable predictions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-950 py-16 text-slate-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-semibold">Recent predictions</h2>
                    <p class="mt-1 text-sm text-slate-400">Only the latest 10 entries are shown. Visit the database for full history.</p>
                </div>
            </div>

            <div class="mt-8 overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-slate-950/30">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-slate-300">
                        <tr>
                            <th class="px-6 py-3 font-semibold">Uploaded</th>
                            <th class="px-6 py-3 font-semibold">File</th>
                            <th class="px-6 py-3 font-semibold">Diagnosis</th>
                            <th class="px-6 py-3 font-semibold">Confidence</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-slate-200">
                        @forelse ($predictions as $prediction)
                            <tr>
                                <td class="px-6 py-4">{{ $prediction->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4">{{ $prediction->original_filename }}</td>
                                <td class="px-6 py-4">{{ $prediction->diagnosis ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    @if (! is_null($prediction->confidence))
                                        {{ number_format($prediction->confidence * 100, 1) }}%
                                    @else
                                        —
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $prediction->status === 'completed' ? 'bg-emerald-500/15 text-emerald-200' : ($prediction->status === 'failed' ? 'bg-red-500/15 text-red-200' : 'bg-blue-500/15 text-blue-200') }}">
                                        <span class="h-2 w-2 rounded-full {{ $prediction->status === 'completed' ? 'bg-emerald-300' : ($prediction->status === 'failed' ? 'bg-red-300' : 'bg-blue-300') }}"></span>
                                        {{ ucfirst($prediction->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-sm text-slate-400">No predictions yet. Upload your first retina scan to see results here.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="bg-white py-16">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-center text-3xl font-bold text-slate-900">How it works</h2>
            <p class="mx-auto mt-4 max-w-2xl text-center text-slate-600">Our pipeline combines state-of-the-art convolutional neural networks with handcrafted clinical rules to give you interpretable, actionable insights.</p>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-500/10 text-blue-600">1</span>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Upload</h3>
                    <p class="mt-2 text-sm text-slate-600">Select a high-resolution fundus image. We automatically validate and anonymize your file before processing.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-600">2</span>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Analyze</h3>
                    <p class="mt-2 text-sm text-slate-600">Our AI scans for microaneurysms, exudates, and neovascularization patterns, generating severity scores instantly.</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-500/10 text-purple-600">3</span>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Act</h3>
                    <p class="mt-2 text-sm text-slate-600">Download a PDF summary and share it with your ophthalmologist for personalized treatment planning.</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

