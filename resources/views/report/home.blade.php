<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Anonymous School Incident Reporting</title>
    @vite('resources/css/app.css')
    <style>
        html { scroll-behavior: smooth; }
        .hero-glow { background:
            radial-gradient(60rem 30rem at 50% -10%, rgba(59,130,246,.35), transparent 60%),
            linear-gradient(to bottom, #172554, #1e3a8a 70%, #1e3a8a); }
        .hero-grid { background-image:
            linear-gradient(rgba(255,255,255,.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.05) 1px, transparent 1px);
            background-size: 44px 44px;
            -webkit-mask-image: radial-gradient(ellipse at center, #000 30%, transparent 75%);
            mask-image: radial-gradient(ellipse at center, #000 30%, transparent 75%); }
        .pulse-ring { animation: pulse-ring 2.4s ease-out infinite; }
        @keyframes pulse-ring { 0% { box-shadow: 0 0 0 0 rgba(220,38,38,.55);} 100% { box-shadow: 0 0 0 18px rgba(220,38,38,0);} }
        .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.show { opacity: 1; transform: none; }
        .step-panel { display: none; }
        .step-panel.active { display: grid; animation: fadein .35s ease; }
        @keyframes fadein { from { opacity: 0; transform: translateY(6px);} to { opacity: 1; transform: none;} }
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
        details[open] .chev { transform: rotate(180deg); }

        /* Navbar hover + active highlight */
        .nav-link {
            position: relative;
            padding: 4px 0;
            color: #dbeafe; /* blue-100 */
            transition: color .25s ease;
        }
        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            height: 2px;
            width: 0;
            border-radius: 2px;
            background: #facc15; /* yellow-400 */
            transition: width .25s ease;
        }
        .nav-link:hover { color: #fff; }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active { color: #facc15; font-weight: 700; }
        .nav-link.active::after { width: 100%; }

        @media (prefers-reduced-motion: reduce) {
            .pulse-ring, .step-panel.active { animation: none; }
            .reveal { opacity: 1; transform: none; transition: none; }
            html { scroll-behavior: auto; }
            .nav-link, .nav-link::after { transition: none; }
        }
    </style>
</head>
<body class="bg-slate-50">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-950 to-blue-900 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-12 h-12 rounded-full object-cover border-2 border-red-600">
            <div>
                <h1 class="text-white font-extrabold text-xl tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
                <p class="text-blue-200 text-[11px] tracking-wider uppercase">Computer Communication Development Institute</p>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-8 font-medium text-sm">
            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

            <a href="{{ route('report.track') }}"
               class="nav-link {{ request()->routeIs('report.track*') ? 'active' : '' }}">Track Report</a>

            <a href="{{ route('about') }}"
               class="nav-link {{ request()->routeIs('about*') ? 'active' : '' }}">About</a>

            <a href="{{ route('contact') }}"
               class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a>

            <a href="{{ route('terms') }}"
               class="nav-link {{ request()->routeIs('terms*') ? 'active' : '' }}">Terms</a>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('faculty.login') }}"
               class="border border-blue-300 text-sm font-semibold px-4 py-2 rounded-lg transition
                      {{ request()->routeIs('faculty.login') ? 'bg-white text-blue-900' : 'bg-white/10 text-white hover:bg-white hover:text-blue-900' }}">
                Faculty Login
            </a>
            <a href="/admin/login"
               class="border border-blue-300 text-sm font-semibold px-4 py-2 rounded-lg transition
                      {{ request()->is('admin/login') ? 'bg-white text-blue-900' : 'text-white hover:bg-white hover:text-blue-900' }}">
                Admin Login
            </a>
        </div>
    </div>
</nav>

<!-- Hero -->
<header class="hero-glow relative overflow-hidden">
    <div class="hero-grid absolute inset-0"></div>
    <div class="relative max-w-4xl mx-auto px-6 pt-20 pb-32 text-center">
        <h2 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">
            Report a Concern, <span class="text-red-500">Protect</span> Our School.
        </h2>
        <p class="mt-5 text-lg md:text-xl text-blue-100">Submit an anonymous report safely and confidentiality.</p>

        <div class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('report.create') }}"
               class="pulse-ring inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-red-600 to-red-700 px-7 py-3.5 font-bold text-white shadow-lg shadow-red-900/40 transition hover:from-red-700 hover:to-red-800 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Submit a Report
            </a>
            <a href="{{ route('report.track') }}"
               class="inline-flex items-center rounded-lg border-2 border-blue-300 px-7 py-3 font-bold text-white transition hover:bg-white hover:text-blue-900 hover:-translate-y-0.5">
                Track Your Report
            </a>
        </div>
    </div>
</header>

<!-- Trust strip (overlaps hero) -->
<section class="relative -mt-14 px-6">
    <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-slate-100 rounded-2xl border border-slate-200 bg-white shadow-xl shadow-blue-950/10">
        <div class="flex items-center gap-4 p-6">
            <span class="grid size-12 shrink-0 place-items-center rounded-full bg-blue-100 text-blue-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
            </span>
            <div><p class="font-bold text-blue-950">100% Anonymous</p><p class="text-sm text-slate-500">No name or personal data collected.</p></div>
        </div>
        <div class="flex items-center gap-4 p-6">
            <span class="grid size-12 shrink-0 place-items-center rounded-full bg-red-100 text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M12 7v6m0 3.5v.01"/></svg>
            </span>
            <div><p class="font-bold text-blue-950">Fast Reporting</p><p class="text-sm text-slate-500">Four fields, done in minutes.</p></div>
        </div>
        <div class="flex items-center gap-4 p-6">
            <span class="grid size-12 shrink-0 place-items-center rounded-full bg-blue-100 text-blue-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 12.5l3 3 5-6"/></svg>
            </span>
            <div><p class="font-bold text-blue-950">Direct Action</p><p class="text-sm text-slate-500">Goes straight to the administration.</p></div>
        </div>
    </div>
</section>

<!-- About -->
<section class="max-w-5xl mx-auto px-6 pt-20 reveal">
    <div class="grid items-center gap-10 md:grid-cols-5">
        <div class="md:col-span-3">
            <h3 class="text-3xl font-extrabold text-blue-950">What is SafeReport?</h3>
            <div class="mt-3 h-1 w-14 rounded-full bg-red-600"></div>
            <p class="mt-6 text-[17px] leading-relaxed text-slate-600">
                <span class="font-semibold text-blue-900">SafeReport</span> is a web-based system by the
                <span class="font-semibold text-blue-950">Computer Communication Development Institute (CCDI)</span>.
                It gives students a safe and confidential way to report any incident or threat within the school.
            </p>
            <p class="mt-4 text-[17px] leading-relaxed text-slate-600">
                You can speak up without fear of your identity being revealed.
            </p>
        </div>

        <div class="md:col-span-2 rounded-3xl bg-gradient-to-b from-blue-950 to-blue-800 p-7 text-white shadow-xl shadow-blue-950/20">
            <div class="mb-5 grid size-12 place-items-center rounded-full bg-white/15 ring-1 ring-white/40">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <ul class="space-y-3.5 text-sm">
                <li class="flex items-start gap-3"><span class="mt-0.5 font-bold text-emerald-300">✓</span><span>Open to all CCDI students</span></li>
                <li class="flex items-start gap-3"><span class="mt-0.5 font-bold text-emerald-300">✓</span><span>No name or personal data collected</span></li>
                <li class="flex items-start gap-3"><span class="mt-0.5 font-bold text-emerald-300">✓</span><span>Reviewed directly by the administration</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- How it works (interactive tabs) -->
<section class="max-w-5xl mx-auto px-6 pt-20 reveal">
    <h3 class="text-3xl font-extrabold text-blue-950 text-center">How reporting works</h3>
    <p class="mt-2 text-center text-slate-500">Select a step to see what happens.</p>

    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-blue-950/10">
        <div class="grid grid-cols-3 border-b border-slate-100 bg-slate-50" role="tablist">
            <button type="button" role="tab" aria-selected="true" data-step="0" class="step-tab px-4 py-4 text-sm font-semibold transition border-b-4 border-red-600 text-blue-950">1. Fill in the report</button>
            <button type="button" role="tab" aria-selected="false" data-step="1" class="step-tab px-4 py-4 text-sm font-semibold transition border-b-4 border-transparent text-slate-500 hover:text-blue-900">2. Get a tracking code</button>
            <button type="button" role="tab" aria-selected="false" data-step="2" class="step-tab px-4 py-4 text-sm font-semibold transition border-b-4 border-transparent text-slate-500 hover:text-blue-900">3. Follow the progress</button>
        </div>

        <div class="p-8 md:p-10">
            <div class="step-panel active gap-3" data-panel="0">
                <h4 class="text-xl font-bold text-blue-950">Tell us what happened</h4>
                <p class="text-slate-600 leading-relaxed">Choose the incident type, say where it happened, describe the event, and attach a photo or video if you have one. You never have to enter your name.</p>
                <a href="{{ route('report.create') }}" class="mt-2 w-fit text-sm font-semibold text-blue-700 underline hover:text-blue-900">Start a report</a>
            </div>
            <div class="step-panel gap-3" data-panel="1">
                <h4 class="text-xl font-bold text-blue-950">Keep your tracking code</h4>
                <p class="text-slate-600 leading-relaxed">After you submit, the system gives you a tracking code. It is the only way to check your report later, so save it somewhere safe.</p>
            </div>
            <div class="step-panel gap-3" data-panel="2">
                <h4 class="text-xl font-bold text-blue-950">See what the administration did</h4>
                <p class="text-slate-600 leading-relaxed">Enter your tracking code on the Track Report page to see the current status and any updates, without logging in.</p>
                <a href="{{ route('report.track') }}" class="mt-2 w-fit text-sm font-semibold text-blue-700 underline hover:text-blue-900">Track a report</a>
            </div>

            <div class="mt-8 h-1.5 overflow-hidden rounded-full bg-slate-100">
                <div id="step-bar" class="h-full w-1/3 rounded-full bg-gradient-to-r from-blue-900 to-blue-700 transition-all duration-500"></div>
            </div>
        </div>
    </div>
</section>

<!-- What you can report (expandable cards) -->
<section class="max-w-5xl mx-auto px-6 pt-20 reveal">
    <h3 class="text-3xl font-extrabold text-blue-950 text-center">What you can report</h3>
    <p class="mt-2 text-center text-slate-500">Select a category to read more.</p>

    <div class="mt-8 grid gap-4 md:grid-cols-2">
        @php
            $types = [
                ['Bullying', 'Including cyberbullying. Repeated hurtful behavior in person or online.'],
                ['Harassment', 'Unwanted behavior that makes someone feel unsafe or uncomfortable.'],
                ['Possession of Deadly Weapons', 'Any weapon brought onto school grounds. Report it as soon as you can.'],
                ['Theft', 'Missing or stolen belongings of students, staff, or the school.'],
                ['Vandalism', 'Damage to school property, facilities, or equipment.'],
                ['Other Incidents or Threats', 'Anything else that puts the school community at risk.'],
            ];
        @endphp
        @foreach ($types as $t)
            <details class="group rounded-2xl border border-slate-200 bg-white px-6 py-4 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                <summary class="flex cursor-pointer items-center justify-between gap-4 font-semibold text-blue-950">
                    {{ $t[0] }}
                    <svg class="chev size-5 shrink-0 text-slate-400 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/></svg>
                </summary>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $t[1] }}</p>
            </details>
        @endforeach
    </div>
</section>

<!-- FAQ -->
<section class="max-w-3xl mx-auto px-6 pt-20 reveal">
    <h3 class="text-3xl font-extrabold text-blue-950 text-center">Common questions</h3>
    <div class="mt-8 divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white">
        @php
            $faqs = [
                ['Will anyone know it was me?', 'No. The form does not ask for your name or personal information. Avoid putting details in the description that could identify you.'],
                ['What files can I attach?', 'Photos and videos (PNG, JPG, MP4, MOV). You can attach more than one file.'],
                ['What if it is an emergency?', 'Do not rely on the online report. Go directly to the guidance office or school security personnel.'],
            ];
        @endphp
        @foreach ($faqs as $f)
            <details class="px-6 py-4">
                <summary class="flex cursor-pointer items-center justify-between gap-4 font-semibold text-blue-950">
                    {{ $f[0] }}
                    <svg class="chev size-5 shrink-0 text-slate-400 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/></svg>
                </summary>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $f[1] }}</p>
            </details>
        @endforeach
    </div>
</section>

<!-- Call to action -->
<section class="px-6 py-20 reveal">
    <div class="max-w-4xl mx-auto rounded-3xl bg-gradient-to-b from-blue-950 to-blue-800 px-8 py-12 text-center text-white shadow-xl shadow-blue-950/20">
        <h3 class="text-2xl md:text-3xl font-extrabold">See something? Say something.</h3>
        <p class="mt-2 text-blue-100">Your voice helps keep our school safe.</p>
        <a href="{{ route('report.create') }}" class="mt-7 inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-red-600 to-red-700 px-7 py-3.5 font-bold text-white shadow-lg shadow-red-900/40 transition hover:from-red-700 hover:to-red-800 hover:-translate-y-0.5">
            Submit a Report
        </a>
    </div>
</section>

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

<script>
// How-it-works tabs
const tabs = document.querySelectorAll('.step-tab');
const panels = document.querySelectorAll('.step-panel');
const bar = document.getElementById('step-bar');
tabs.forEach(tab => tab.addEventListener('click', () => {
    const i = Number(tab.dataset.step);
    tabs.forEach((t, n) => {
        const on = n === i;
        t.setAttribute('aria-selected', on);
        t.classList.toggle('border-red-600', on);
        t.classList.toggle('text-blue-950', on);
        t.classList.toggle('border-transparent', !on);
        t.classList.toggle('text-slate-500', !on);
    });
    panels.forEach((p, n) => p.classList.toggle('active', n === i));
    bar.style.width = ((i + 1) / tabs.length * 100) + '%';
}));

// Section reveal on scroll
const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('show'); io.unobserve(e.target); } });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>

</body>
</html>