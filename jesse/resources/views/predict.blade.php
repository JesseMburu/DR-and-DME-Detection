<x-app-layout>
    <section class="relative isolate overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-slate-100">
        <div class="absolute inset-0 -z-10 opacity-50">
            <div class="absolute -top-32 left-12 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-20 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div class="space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-1 text-sm font-semibold text-blue-200 ring-1 ring-white/15">
                        AI-Assisted Screening
                    </span>
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
                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-6 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-500/20 text-blue-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5.25c1.148 0 2.25.285 3.195.81a3.755 3.755 0 011.68 2.045c.17.482.267.99.267 1.512 0 .523-.097 1.03-.267 1.512-.289.82-.82 1.533-1.68 2.045A6.75 6.75 0 1112 5.25z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 14.25L18 16.5m0 0l2.25 2.25M18 16.5l2.25-2.25M18 16.5l-2.25 2.25" />
                            </svg>
                        </div>
                        <h2 class="mt-4 text-xl font-semibold text-white">Awaiting your next scan</h2>
                        <p class="mt-2 text-sm text-slate-300">Drag and drop your image or click “Upload Image” to begin. RetinaCare supports JPG, PNG, and DICOM exports.</p>

                        <div class="mt-6 rounded-xl border border-white/10 bg-slate-900/60 p-4 text-left text-sm text-slate-300">
                            <p class="font-semibold text-white">Need help?</p>
                            <p class="mt-1">Check our imaging guide to ensure proper lighting, focus, and field-of-view for the most accurate predictions.</p>
                        </div>
                    </div>
                </div>
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
