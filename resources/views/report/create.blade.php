<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Submit Anonymous Report</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-950 to-blue-900 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-12 h-12 rounded-full object-cover border-2 border-red-600">
            <div>
                <h1 class="text-white font-extrabold text-xl tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
                <p class="text-blue-200 text-[11px] tracking-wider uppercase">Computer Communication Development Institute</p>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-8 text-blue-100 font-medium text-sm">
            <a href="{{ route('report.create') }}" class="hover:text-white transition">Home</a>
            <a href="{{ route('report.track') }}" class="hover:text-white transition text-yellow-400 font-bold">Track Report</a>
            <a href="{{ route('about') }}" class="hover:text-white transition">About Us</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
            <a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a>
        </div>

        <a href="/admin/login"
           class="border border-blue-300 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition">
            Admin Login
        </a>
    </div>
</nav>

<!-- Hero -->
<div class="bg-gradient-to-b from-blue-950 via-blue-900 to-slate-800 pb-24 pt-16 px-6 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>
    <h2 class="relative text-white text-4xl md:text-5xl font-extrabold leading-tight max-w-3xl mx-auto">
        Report a Concern, <span class="text-red-500">Protect</span> Our School.
    </h2>
    <p class="relative text-blue-200 mt-4 text-lg">Submit an anonymous report safely and confidentially.</p>

    <div class="relative mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="#report-section"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold text-base px-8 py-3.5 rounded-xl shadow-lg shadow-red-900/40 transition hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z"/>
            </svg>
            Submit a Report
        </a>

        <a href="{{ route('report.track') }}"
           class="inline-flex items-center gap-2 border-2 border-blue-300 text-white hover:bg-white hover:text-blue-900 font-semibold text-base px-8 py-3.5 rounded-xl transition hover:-translate-y-0.5">
            Track Your Report
        </a>
    </div>
</div>

<!-- Description / About Section -->
<div class="max-w-5xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-3 gap-8 text-center">
        <div class="bg-white rounded-xl shadow-md p-6 border border-slate-100">
            <div class="w-14 h-14 mx-auto rounded-full bg-blue-100 flex items-center justify-center mb-4">
                <svg class="w-7 h-7 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h3 class="font-bold text-slate-800 mb-2">100% Anonymous</h3>
            <p class="text-slate-500 text-sm">No personal information about the reporter is collected or stored. Every submission is safe and confidential.</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border border-slate-100">
            <div class="w-14 h-14 mx-auto rounded-full bg-red-100 flex items-center justify-center mb-4">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                </svg>
            </div>
            <h3 class="font-bold text-slate-800 mb-2">Fast Reporting</h3>
            <p class="text-slate-500 text-sm">A simple process — select the incident type, fill in the details, and submit your report right away.</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border border-slate-100">
            <div class="w-14 h-14 mx-auto rounded-full bg-blue-100 flex items-center justify-center mb-4">
                <svg class="w-7 h-7 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="font-bold text-slate-800 mb-2">Direct Action</h3>
            <p class="text-slate-500 text-sm">Every submitted report goes directly to the administration for prompt response.</p>
        </div>
    </div>

    <!-- How It Works -->
<section class="bg-white border-y border-slate-100 mt-12">
    <div class="max-w-5xl mx-auto px-6 py-16">
        <div class="text-center mb-14">
            <h2 class="text-blue-950 font-extrabold text-3xl">How It Works</h2>
            <p class="text-slate-500 text-sm mt-2">Three simple steps to report a concern.</p>
        </div>

        <div class="relative grid md:grid-cols-3 gap-10">
            <!-- Linyang nag-uugnay (desktop lang) -->
            <div class="hidden md:block absolute top-8 left-[16.66%] right-[16.66%] border-t-2 border-dashed border-blue-200"></div>

            <!-- Step 1 -->
            <div class="relative text-center px-2">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-950 text-white font-extrabold text-2xl flex items-center justify-center shadow-lg ring-8 ring-white">1</div>
                <h3 class="text-blue-950 font-bold text-lg mt-5">Fill Out the Form</h3>
                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                    Select the incident type, enter the location, and describe what happened. You may attach a photo or video as proof.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="relative text-center px-2">
                <div class="w-16 h-16 mx-auto rounded-full bg-red-600 text-white font-extrabold text-2xl flex items-center justify-center shadow-lg ring-8 ring-white">2</div>
                <h3 class="text-blue-950 font-bold text-lg mt-5">Submit and Get a Code</h3>
                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                    Agree to the Terms and Conditions, then submit. You will receive a tracking code. Keep it safe.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="relative text-center px-2">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-950 text-white font-extrabold text-2xl flex items-center justify-center shadow-lg ring-8 ring-white">3</div>
                <h3 class="text-blue-950 font-bold text-lg mt-5">Track Your Report</h3>
                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                    Use your tracking code on the
                    <a href="{{ route('report.track') }}" class="text-blue-700 underline hover:text-blue-900">Track Report</a>
                    page to check the status of your report.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="max-w-3xl mx-auto px-6 py-14">
    <div class="text-center mb-8">
        <h2 class="text-blue-950 font-extrabold text-2xl">Frequently Asked Questions</h2>
        <p class="text-slate-500 text-sm mt-1">Quick answers to common concerns.</p>
    </div>

    <div class="space-y-3">
        <details class="group bg-white rounded-xl shadow-md border border-slate-100 p-5">
            <summary class="flex items-center justify-between cursor-pointer text-blue-950 font-semibold list-none">
                Is my report really anonymous?
                <span class="text-blue-900 transition group-open:rotate-180">&#9662;</span>
            </summary>
            <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                Yes. SafeReport does not require your name or any account. Please avoid including personal details that could identify you in your description.
            </p>
        </details>

        <details class="group bg-white rounded-xl shadow-md border border-slate-100 p-5">
            <summary class="flex items-center justify-between cursor-pointer text-blue-950 font-semibold list-none">
                What happens after I submit a report?
                <span class="text-blue-900 transition group-open:rotate-180">&#9662;</span>
            </summary>
            <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                Your report goes directly to the CCDI administration for review. You will receive a tracking code to check its status.
            </p>
        </details>

        <details class="group bg-white rounded-xl shadow-md border border-slate-100 p-5">
            <summary class="flex items-center justify-between cursor-pointer text-blue-950 font-semibold list-none">
                What if I lose my tracking code?
                <span class="text-blue-900 transition group-open:rotate-180">&#9662;</span>
            </summary>
            <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                Because reports are anonymous, the code cannot be recovered. Please save or write it down right after submitting.
            </p>
        </details>

        <details class="group bg-white rounded-xl shadow-md border border-slate-100 p-5">
            <summary class="flex items-center justify-between cursor-pointer text-blue-950 font-semibold list-none">
                Can I attach photos or videos?
                <span class="text-blue-900 transition group-open:rotate-180">&#9662;</span>
            </summary>
            <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                Yes. You may upload photo or video evidence (PNG, JPG, MP4, MOV) when filling out the form.
            </p>
        </details>

        <details class="group bg-white rounded-xl shadow-md border border-slate-100 p-5">
            <summary class="flex items-center justify-between cursor-pointer text-blue-950 font-semibold list-none">
                Who can use SafeReport?
                <span class="text-blue-900 transition group-open:rotate-180">&#9662;</span>
            </summary>
            <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                Students, teachers, and staff of CCDI can use it to report any incident or threat within the school.
            </p>
        </details>
    </div>
</section>

    <div class="text-center mt-10 max-w-2xl mx-auto">
        <p class="text-slate-600 leading-relaxed">
            <span class="font-semibold text-blue-900">SafeReport</span> is a web-based system by the
            <span class="font-semibold">Computer Communication Development Institute (CCDI)</span>, designed to give
            students, teachers, and staff a safe and confidential way to report any incident or threat within the
            school — without fear of their identity being revealed.
        </p>
    </div>
</div>

<!-- Form Card -->
<div id="report-section" class="max-w-2xl mx-auto px-6 pb-20 relative z-10">

    <!-- Validation Error Container -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
            <strong class="font-bold">Hindi naisubmit ang report:</strong>
            <ul class="list-disc list-inside mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="report-form" action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off"
          class="bg-white rounded-2xl shadow-2xl p-8 md:p-10 space-y-6 border border-slate-100">
        @csrf

        <div class="flex items-center justify-center gap-2 pb-2">
            <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            <h3 class="text-blue-950 font-bold text-xl tracking-wide">SUBMIT ANONYMOUS REPORT</h3>
        </div>

        <!-- Incident Type -->
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Incident Type <span class="text-red-600">*</span></label>
            <select name="incident_type" required
                class="w-full rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm">
                <option value="">Select Incident Type</option>
                <option value="bullying" {{ old('incident_type') == 'bullying' ? 'selected' : '' }}>Bullying (including Cyberbullying)</option>
                <option value="harassment" {{ old('incident_type') == 'harassment' ? 'selected' : '' }}>Harassment</option>
                <option value="deadly_weapon" {{ old('incident_type') == 'deadly_weapon' ? 'selected' : '' }}>Possession of Deadly Weapons</option>
                <option value="theft" {{ old('incident_type') == 'theft' ? 'selected' : '' }}>Theft</option>
                <option value="vandalism" {{ old('incident_type') == 'vandalism' ? 'selected' : '' }}>Vandalism</option>
                <option value="other" {{ old('incident_type') == 'other' ? 'selected' : '' }}>Other Incidents or Threats</option>
            </select>
            @error('incident_type') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Location -->
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Where did it happen? <span class="text-red-600">*</span></label>
            <input type="text" name="location" value="{{ old('location') }}" required
                placeholder="e.g. Room 201, Computer Lab 1, Canteen, Hallway near the library"
                class="w-full rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm placeholder:text-slate-400">
            <p class="text-xs text-slate-400 mt-1">Be as specific as you can so the administration can find the area quickly.</p>
            @error('location') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">What happened? <span class="text-red-600">*</span></label>
            <textarea name="description" rows="4" required
                placeholder="Describe the incident or threat: what happened, when it happened (date and time), and who or what was involved. Avoid including your own name or details that could identify you."
                class="w-full rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm placeholder:text-slate-400">{{ old('description') }}</textarea>
            <p class="text-xs text-slate-400 mt-1">Your report is anonymous. Only share what you are comfortable sharing.</p>
            @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Attach Proof with Preview JS -->
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Attach Proof (Picture or Video)</label>
            <label for="evidence"
                class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-blue-300 rounded-xl py-8 px-4 cursor-pointer hover:bg-blue-50 transition">
                <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 8.25 12 3.75m0 0L7.5 8.25M12 3.75v13.5"/>
                </svg>
                <span id="file-label" class="text-blue-800 text-sm font-medium text-center">
                    Upload photo/video evidence (PNG, JPG, MP4, MOV)
                </span>
                <input id="evidence" type="file" name="evidence[]" multiple accept="image/*,video/*" class="hidden" onchange="previewFiles(this)">
            </label>

            <!-- Dynamic File Names Display -->
            <div id="file-list" class="mt-3 space-y-1 text-xs text-emerald-700 font-semibold"></div>

            @error('evidence') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            @error('evidence.*') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Info Row -->
        <div class="flex items-center justify-between text-sm text-slate-500 border-t border-slate-100 pt-4">
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Security Information
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-blue-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25h-10.5a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                Anonymous Report
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start gap-2 mb-4">
            <input type="checkbox" name="agree_terms" id="agree_terms" required class="mt-1">
            <label for="agree_terms" class="text-sm text-slate-600">
                I have read and agree to the
                <a href="{{ route('terms') }}" target="_blank" class="underline text-blue-700 hover:text-blue-900">Terms and Conditions</a>.
            </label>
        </div>
        @error('agree_terms') <small class="text-red-600 block mb-2">{{ $message }}</small> @enderror

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold tracking-wide py-3.5 rounded-xl shadow-lg shadow-red-600/30 transition uppercase">
            Submit Report
        </button>
    </form>
</div>

<!-- Footer -->
<footer class="bg-blue-950 text-blue-200 pt-14 pb-8 px-6">
    <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-10">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-10 h-10 rounded-full object-cover border-2 border-red-600">
                <div>
                    <h4 class="text-white font-extrabold text-sm tracking-wide">SAFEREPORT<span class="text-red-500">.</span></h4>
                </div>
            </div>
            <p class="text-sm text-blue-300 leading-relaxed">
                An anonymous incident and threat reporting system designed for the
                Computer Communication Development Institute.
            </p>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Quick Links</h5>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('report.create') }}" class="hover:text-white transition">Home</a></li>
                <li><a href="{{ route('report.track') }}" class="hover:text-white transition">Track Report</a></li>
                <li><a href="#" class="hover:text-white transition">About Us</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Contact Us</h5>
            <ul class="space-y-2 text-sm text-blue-300">
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                    Computer Communication Development Institute
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a2.25 2.25 0 00-2.185.58l-.573.573a.75.75 0 01-.912.113 17.933 17.933 0 01-6.667-6.667.75.75 0 01.113-.913l.573-.572a2.25 2.25 0 00.58-2.185l-1.106-4.423A1.125 1.125 0 006.75 2.25H5.25a2.25 2.25 0 00-2.25 2.25v2.25z"/>
                    </svg>
                    (02) 123-4567
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    safereport@ccdi.edu.ph
                </li>
            </ul>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-4 text-sm uppercase tracking-wide">Emergency Info</h5>
            <p class="text-sm text-blue-300 leading-relaxed">
                For emergencies or immediate danger, do not rely on the online report. Go directly to the
                guidance office or school security personnel.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto border-t border-blue-800 mt-10 pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-blue-400">
        <p>&copy; {{ date('Y') }} SafeReport — Computer Communication Development Institute. All Rights Reserved.</p>
        <p>Capstone Project | BS Information Technology</p>
    </div>
</footer>

<!-- JS File Preview Handler & Form Reset -->
<script>
function previewFiles(input) {
    const label = document.getElementById('file-label');
    const fileListContainer = document.getElementById('file-list');
    fileListContainer.innerHTML = '';

    if (input.files && input.files.length > 0) {
        label.textContent = `${input.files.length} file(s) selected`;
        label.classList.add('text-emerald-700', 'font-bold');

        Array.from(input.files).forEach((file, index) => {
            const item = document.createElement('p');
            item.textContent = `✓ ${index + 1}. ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
            fileListContainer.appendChild(item);
        });
    } else {
        label.textContent = "Upload photo/video evidence (PNG, JPG, MP4, MOV)";
        label.classList.remove('text-emerald-700', 'font-bold');
    }
}

window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        document.getElementById('report-form').reset();
        document.getElementById('file-list').innerHTML = '';
        document.getElementById('file-label').textContent = "Upload photo/video evidence (PNG, JPG, MP4, MOV)";
    }
});
</script>

</body>
</html>