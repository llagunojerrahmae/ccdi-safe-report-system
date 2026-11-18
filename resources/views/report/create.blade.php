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
            <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
            <a href="{{ route('report.track') }}" class="hover:text-white transition text-yellow-400 font-bold">Track Report</a>
            <a href="{{ route('about') }}" class="hover:text-white transition">About</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
            <a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a>
        </div>

        <div class="flex items-center gap-3">
    <a href="{{ route('faculty.login') }}"
       class="bg-white/10 border border-blue-300 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition">
        Faculty Login
    </a>
    <a href="/admin/login"
       class="border border-blue-300 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition">
        Admin Login
    </a>
</div>
</nav>

<!-- Form Card -->
<div id="report-section" class="bg-gradient-to-b from-blue-100/70 via-blue-50/40 to-slate-50">
<div class="max-w-2xl mx-auto px-6 pt-12 pb-20">

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
          class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-blue-950/10">
        @csrf

        <!-- Card header -->
        <div class="bg-gradient-to-b from-blue-950 to-blue-800 px-8 pt-8 pb-7 text-center text-white">
            <div class="mx-auto mb-3 grid size-12 place-items-center rounded-full bg-white/15 ring-1 ring-white/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-extrabold tracking-wide">SUBMIT ANONYMOUS REPORT</h3>
            <p class="mt-1.5 text-sm text-blue-100">Your voice helps keep our school safe.</p>
        </div>

        <div class="space-y-7 p-8 md:p-10">

            <!-- Privacy note -->
            <div class="flex items-start gap-3 rounded-2xl bg-blue-50 px-4 py-3.5 text-sm text-blue-900">
                <svg class="mt-0.5 size-5 shrink-0 text-blue-800" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25h-10.5a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                <p>Your report is anonymous. We don't collect your name or any personal information.</p>
            </div>

            <!-- Incident Type -->
            <div>
                <label for="incident_type" class="mb-2 block text-sm font-semibold text-blue-950">Incident Type <span class="text-red-600">*</span></label>
                <div class="relative">
                    <svg class="pointer-events-none absolute left-4 top-1/2 size-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/>
                    </svg>
                    <select id="incident_type" name="incident_type" required
                        class="w-full appearance-none rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-11 text-[15px] text-slate-700 outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">
                        <option value="">Select Incident Type</option>
                        <option value="bullying" {{ old('incident_type') == 'bullying' ? 'selected' : '' }}>Bullying (including Cyberbullying)</option>
                        <option value="harassment" {{ old('incident_type') == 'harassment' ? 'selected' : '' }}>Harassment</option>
                        <option value="deadly_weapon" {{ old('incident_type') == 'deadly_weapon' ? 'selected' : '' }}>Possession of Deadly Weapons</option>
                        <option value="theft" {{ old('incident_type') == 'theft' ? 'selected' : '' }}>Theft</option>
                        <option value="vandalism" {{ old('incident_type') == 'vandalism' ? 'selected' : '' }}>Vandalism</option>
                        <option value="other" {{ old('incident_type') == 'other' ? 'selected' : '' }}>Other Incidents or Threats</option>
                    </select>
                    <svg class="pointer-events-none absolute right-4 top-1/2 size-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                    </svg>
                </div>
                @error('incident_type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="mb-2 block text-sm font-semibold text-blue-950">Where did it happen? <span class="text-red-600">*</span></label>
                <div class="relative">
                    <svg class="pointer-events-none absolute left-4 top-1/2 size-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-6.2 7-11a7 7 0 10-14 0c0 4.8 7 11 7 11z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>
                    <input id="location" type="text" name="location" value="{{ old('location') }}" required
                        placeholder="e.g. Room 201, Computer Lab 1, Canteen, Hallway near the library"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-[15px] outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">
                </div>
                <p class="mt-1.5 text-xs text-slate-500">Be as specific as you can so the administration can find the area quickly.</p>
                @error('location') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <div class="mb-2 flex items-end justify-between">
                    <label for="description" class="block text-sm font-semibold text-blue-950">What happened? <span class="text-red-600">*</span></label>
                    <span id="desc-count" class="text-xs text-slate-400">0 characters</span>
                </div>
                <textarea id="description" name="description" rows="5" required
                    placeholder="Describe the incident or threat: what happened, when it happened (date and time), and who or what was involved. Avoid including your own name or details that could identify you."
                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-[15px] leading-relaxed outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">{{ old('description') }}</textarea>
                <p class="mt-1.5 text-xs text-slate-500">Only share what you are comfortable sharing.</p>
                @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Attach Proof -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-blue-950">Attach Proof <span class="font-normal text-slate-500">(Picture or Video)</span></label>
                <label id="dropzone" for="evidence"
                    class="flex cursor-pointer flex-col items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-blue-300 bg-blue-50/50 px-4 py-8 text-center transition hover:border-blue-700 hover:bg-blue-50">
                    <span class="grid size-12 place-items-center rounded-full bg-blue-100 text-blue-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 8.25 12 3.75m0 0L7.5 8.25M12 3.75v13.5"/>
                        </svg>
                    </span>
                    <span id="file-label" class="text-sm font-semibold text-blue-800">Upload photo/video evidence (PNG, JPG, MP4, MOV)</span>
                    <span class="text-xs text-slate-500">Click to browse or drag files here</span>
                    <input id="evidence" type="file" name="evidence[]" multiple accept="image/*,video/*" class="hidden" onchange="previewFiles(this)">
                </label>

                <!-- Dynamic File Names Display -->
                <div id="file-list" class="mt-3 space-y-2"></div>

                @error('evidence') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                @error('evidence.*') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Terms and Submit -->
            <div class="space-y-5 border-t border-slate-100 pt-7">
                <div>
                    <div class="flex items-start gap-3 rounded-xl bg-slate-50 px-4 py-3.5">
                        <input type="checkbox" name="agree_terms" id="agree_terms" required class="mt-1 size-4 rounded accent-blue-900">
                        <label for="agree_terms" class="text-sm text-slate-600">
                            I have read and agree to the
                            <a href="{{ route('terms') }}" target="_blank" class="font-semibold text-blue-700 underline hover:text-blue-900">Terms and Conditions</a>.
                        </label>
                    </div>
                    @error('agree_terms') <small class="mt-2 block text-red-600">{{ $message }}</small> @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-red-600 to-red-700 py-4 font-bold uppercase tracking-wide text-white shadow-lg shadow-red-600/30 transition hover:from-red-700 hover:to-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        Submit Report
                    </button>
                    <p class="mt-3 text-center text-xs text-slate-500">Your report goes directly to the administration.</p>
                </div>
            </div>
        </div>
    </form>
</div>
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
                <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                <li><a href="{{ route('report.track') }}" class="hover:text-white transition">Track Report</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                <li><a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a></li>
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
const DEFAULT_LABEL = "Upload photo/video evidence (PNG, JPG, MP4, MOV)";

function previewFiles(input) {
    const label = document.getElementById('file-label');
    const fileListContainer = document.getElementById('file-list');
    fileListContainer.innerHTML = '';

    if (input.files && input.files.length > 0) {
        label.textContent = `${input.files.length} file(s) selected`;

        Array.from(input.files).forEach((file) => {
            const chip = document.createElement('div');
            chip.className = 'flex items-center gap-2 rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs text-emerald-800';

            const check = document.createElement('span');
            check.className = 'font-bold';
            check.textContent = '✓';

            const name = document.createElement('span');
            name.className = 'min-w-0 flex-1 truncate font-semibold';
            name.textContent = file.name;

            const size = document.createElement('span');
            size.className = 'text-emerald-600';
            size.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';

            chip.append(check, name, size);
            fileListContainer.appendChild(chip);
        });
    } else {
        label.textContent = DEFAULT_LABEL;
    }
}

// Live character counter
const descBox = document.getElementById('description');
const descCount = document.getElementById('desc-count');
function updateCount() { descCount.textContent = descBox.value.length + ' characters'; }
descBox.addEventListener('input', updateCount);
updateCount();

// Drag and drop
const zone = document.getElementById('dropzone');
const evidenceInput = document.getElementById('evidence');
['dragenter', 'dragover'].forEach(ev => zone.addEventListener(ev, e => {
    e.preventDefault();
    zone.classList.add('border-blue-700', 'bg-blue-50');
}));
['dragleave', 'drop'].forEach(ev => zone.addEventListener(ev, e => {
    e.preventDefault();
    zone.classList.remove('border-blue-700', 'bg-blue-50');
}));
zone.addEventListener('drop', e => {
    if (e.dataTransfer.files.length) {
        evidenceInput.files = e.dataTransfer.files;
        previewFiles(evidenceInput);
    }
});

window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        document.getElementById('report-form').reset();
        document.getElementById('file-list').innerHTML = '';
        document.getElementById('file-label').textContent = DEFAULT_LABEL;
        updateCount();
    }
});
</script>

</body>
</html>