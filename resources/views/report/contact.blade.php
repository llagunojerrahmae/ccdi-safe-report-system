<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SafeReport</title>
    @vite('resources/css/app.css')
    <style>
        .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.show { opacity: 1; transform: none; }
        .panel-enter { animation: panelIn .35s ease both; }
        @keyframes panelIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
        .help-tab { color: #475569; }
        .help-tab:hover { color: #172554; }
        .help-tab.active { background: #172554; color: #fff; box-shadow: 0 4px 12px rgba(23,37,84,.25); }
        @media (prefers-reduced-motion: reduce) {
            .reveal { opacity: 1; transform: none; transition: none; }
            .panel-enter { animation: none; }
        }
    </style>
    <noscript><style>.reveal { opacity: 1; transform: none; }</style></noscript>
</head>
<body class="bg-slate-50 font-sans antialiased">

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
            <a href="{{ route('report.track') }}" class="hover:text-white transition">Track Report</a>
            <a href="{{ route('about') }}" class="hover:text-white transition">About</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition text-yellow-400 font-bold">Contact</a>
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
    </div>
</nav>

<!-- Content -->
<div class="bg-gradient-to-b from-blue-100/70 via-blue-50/40 to-slate-50">
<div class="max-w-3xl mx-auto px-6 pt-14 pb-20">

    <!-- Title -->
    <div class="text-center mb-10 reveal">
        <h2 class="text-blue-950 font-extrabold text-3xl md:text-4xl tracking-wide mt-5">CONTACT US<span class="text-red-600">.</span></h2>
        <div class="w-14 h-1 bg-red-600 rounded-full mx-auto mt-3"></div>
        <p class="text-slate-500 text-sm mt-3">We are here to help.</p>
    </div>

    <div class="space-y-6">

        <!-- Emergency notice -->
        <div class="reveal flex items-start gap-4 bg-red-50 border border-red-200 border-l-4 border-l-red-600 rounded-2xl p-6 text-sm">
            <div class="w-11 h-11 shrink-0 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-red-700 font-bold text-base">In immediate danger?</h3>
                <p class="text-slate-600 mt-1 leading-relaxed">
                    SafeReport is not an emergency hotline. Call school security or <span class="font-bold text-red-700">911</span> right away.
                </p>
            </div>
        </div>

        <!-- Contact details -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm">
            <div class="flex items-center justify-between gap-3 mb-5">
                <h3 class="text-blue-950 font-bold text-lg">Reach the office</h3>
                <span id="open-badge" class="hidden items-center gap-2 rounded-full px-3 py-1 text-xs font-bold ring-1 ring-inset"></span>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                <!-- Email -->
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Email</p>
                    <a href="mailto:safereport@ccdi.edu.ph" class="mt-1 block text-xs break-words text-blue-700 hover:underline">safereport@ccdi.edu.ph</a>
                    <button type="button" data-copy="safereport@ccdi.edu.ph" class="copy-btn mt-3 inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-slate-600 transition hover:border-blue-900 hover:bg-blue-950 hover:text-white">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75m9 10.5h3.375c.621 0 1.125-.504 1.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125h-9.75c-.621 0-1.125.504-1.125 1.125v3.375m9.75 10.5H9.75"/></svg>
                        <span class="copy-label">Copy</span>
                    </button>
                </div>

                <!-- Phone -->
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a2.25 2.25 0 00-2.185.58l-.573.573a.75.75 0 01-.912.113 17.933 17.933 0 01-6.667-6.667.75.75 0 01.113-.913l.573-.572a2.25 2.25 0 00.58-2.185l-1.106-4.423A1.125 1.125 0 006.75 2.25H5.25a2.25 2.25 0 00-2.25 2.25v2.25z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Phone</p>
                    <a href="tel:021234567" class="mt-1 block text-xs text-blue-700 hover:underline">(02) 123-4567</a>
                    <button type="button" data-copy="(02) 123-4567" class="copy-btn mt-3 inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-slate-600 transition hover:border-blue-900 hover:bg-blue-950 hover:text-white">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75m9 10.5h3.375c.621 0 1.125-.504 1.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125h-9.75c-.621 0-1.125.504-1.125 1.125v3.375m9.75 10.5H9.75"/></svg>
                        <span class="copy-label">Copy</span>
                    </button>
                </div>

                <!-- Address -->
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Address</p>
                    <p class="mt-1 text-xs">Sikatuna Street, Old Albay, Legazpi City</p>
                    <button type="button" data-copy="Sikatuna Street, Old Albay, Legazpi City" class="copy-btn mt-3 inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-slate-600 transition hover:border-blue-900 hover:bg-blue-950 hover:text-white">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75m9 10.5h3.375c.621 0 1.125-.504 1.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125h-9.75c-.621 0-1.125.504-1.125 1.125v3.375m9.75 10.5H9.75"/></svg>
                        <span class="copy-label">Copy</span>
                    </button>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-center gap-3 bg-blue-50 border border-blue-100 rounded-xl px-5 py-4 text-center">
                <svg class="w-5 h-5 shrink-0 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-left">
                    <p class="text-blue-950 font-bold">Office Hours</p>
                    <p class="text-xs mt-0.5">Monday to Friday, 8:00 AM to 5:00 PM</p>
                </div>
            </div>
        </div>

        <!-- Who are you? -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8">
            <h3 class="text-blue-950 font-bold text-lg">What do you need help with?</h3>
            <p class="text-slate-500 text-sm mt-1">Choose who you are to see the quickest way to get help.</p>

            <div class="mt-5 grid grid-cols-3 gap-2 rounded-2xl bg-slate-100 p-1.5" role="tablist">
                <button type="button" role="tab" data-help="student" class="help-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Student</button>
                <button type="button" role="tab" data-help="faculty" class="help-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Faculty</button>
                <button type="button" role="tab" data-help="other" class="help-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Others</button>
            </div>

            <!-- Student -->
            <div data-help-panel="student" class="mt-6 space-y-3 text-sm text-slate-600">
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">I want to report something</p>
                    <p class="mt-1">You do not need to contact us. Use the anonymous form on the home page.</p>
                    <a href="{{ route('home') }}#report-section" class="mt-3 inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-4 py-2 text-xs font-bold text-white transition hover:bg-red-700">Submit a Report</a>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">I want to check my report</p>
                    <p class="mt-1">Enter your tracking code on the Track Report page.</p>
                    <a href="{{ route('report.track') }}" class="mt-3 inline-flex items-center gap-1.5 rounded-lg bg-blue-950 px-4 py-2 text-xs font-bold text-white transition hover:bg-blue-900">Track Your Report</a>
                </div>
                <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                    <p class="font-bold text-amber-800">I lost my tracking code</p>
                    <p class="mt-1 text-amber-900/80">A lost code cannot be recovered, since reports are anonymous. If it is still a concern, you may submit a new report.</p>
                </div>
            </div>

            <!-- Faculty -->
            <div data-help-panel="faculty" class="mt-6 hidden space-y-3 text-sm text-slate-600">
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">I want to log in</p>
                    <p class="mt-1">Use the Faculty Login page. Your account must already be approved by the administrator.</p>
                    <a href="{{ route('faculty.login') }}" class="mt-3 inline-flex items-center gap-1.5 rounded-lg bg-blue-950 px-4 py-2 text-xs font-bold text-white transition hover:bg-blue-900">Faculty Login</a>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">My account is still pending</p>
                    <p class="mt-1">The administrator has to verify that you are CCDI faculty before you can log in. If you have been waiting for a while, email or call the office and mention your full name and that you requested a faculty account.</p>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">I have a question about a report or a note</p>
                    <p class="mt-1">Reports are confidential. Please raise concerns about a specific report with the administrator directly, using the office details above.</p>
                </div>
            </div>

            <!-- Others -->
            <div data-help-panel="other" class="mt-6 hidden space-y-3 text-sm text-slate-600">
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">General questions about SafeReport</p>
                    <p class="mt-1">Email us or visit the office during office hours. You can also read how the system works on the About page.</p>
                    <a href="{{ route('about') }}" class="mt-3 inline-flex items-center gap-1.5 rounded-lg bg-blue-950 px-4 py-2 text-xs font-bold text-white transition hover:bg-blue-900">About SafeReport</a>
                </div>
                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                    <p class="font-bold text-blue-950">Questions about privacy or our rules</p>
                    <p class="mt-1">Read the Terms and Conditions first. If you still have questions, contact the office.</p>
                    <a href="{{ route('terms') }}" class="mt-3 inline-flex items-center gap-1.5 rounded-lg border border-blue-950 px-4 py-2 text-xs font-bold text-blue-950 transition hover:bg-blue-950 hover:text-white">Terms and Conditions</a>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="reveal bg-gradient-to-b from-blue-950 to-blue-800 rounded-2xl shadow-xl shadow-blue-950/10 p-8 text-center">
            <h3 class="text-white font-extrabold text-xl">Have a concern? Speak up safely.</h3>
            <p class="text-blue-100 text-sm mt-2">Your report is anonymous and goes directly to authorized school personnel.</p>
            <div class="mt-5 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('home') }}#report-section"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-red-600/30 transition">
                    Submit a Report
                </a>
                <a href="{{ route('report.track') }}"
                   class="inline-flex items-center gap-2 border-2 border-blue-300 text-white hover:bg-white hover:text-blue-900 font-semibold px-6 py-3 rounded-xl transition">
                    Track Your Report
                </a>
            </div>
        </div>

    </div>
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

<script>
    // Scroll reveal
    (() => {
        const els = document.querySelectorAll('.reveal');
        if (!('IntersectionObserver' in window)) { els.forEach(e => e.classList.add('show')); return; }
        const io = new IntersectionObserver((entries) => {
            entries.forEach(en => { if (en.isIntersecting) { en.target.classList.add('show'); io.unobserve(en.target); } });
        }, { threshold: 0.12 });
        els.forEach(e => io.observe(e));
    })();

    // Copy buttons
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const label = btn.querySelector('.copy-label');
            try {
                await navigator.clipboard.writeText(btn.dataset.copy);
                label.textContent = 'Copied!';
            } catch (e) {
                label.textContent = 'Press Ctrl+C';
            }
            setTimeout(() => label.textContent = 'Copy', 1500);
        });
    });

    // Help tabs
    (() => {
        const tabs = document.querySelectorAll('.help-tab');
        const panels = document.querySelectorAll('[data-help-panel]');
        function select(name) {
            tabs.forEach(t => {
                const on = t.dataset.help === name;
                t.classList.toggle('active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            panels.forEach(p => {
                const on = p.dataset.helpPanel === name;
                p.classList.toggle('hidden', !on);
                if (on) { p.classList.remove('panel-enter'); void p.offsetWidth; p.classList.add('panel-enter'); }
            });
        }
        tabs.forEach(t => t.addEventListener('click', () => select(t.dataset.help)));
        select(location.hash === '#faculty' ? 'faculty' : 'student');
    })();

    // Open / closed badge (Mon-Fri, 8:00 AM - 5:00 PM, Philippine time)
    (() => {
        const badge = document.getElementById('open-badge');
        try {
            const parts = new Intl.DateTimeFormat('en-US', {
                timeZone: 'Asia/Manila', weekday: 'short', hour: 'numeric', minute: 'numeric', hour12: false
            }).formatToParts(new Date());
            const get = t => parts.find(p => p.type === t).value;
            const day = get('weekday');
            const mins = (parseInt(get('hour'), 10) % 24) * 60 + parseInt(get('minute'), 10);
            const weekday = !['Sat', 'Sun'].includes(day);
            const open = weekday && mins >= 8 * 60 && mins < 17 * 60;

            badge.classList.remove('hidden');
            badge.classList.add('inline-flex');
            badge.className = badge.className.replace(/\b(bg|text|ring)-(green|red|slate)-\d+\b/g, '');
            if (open) {
                badge.classList.add('bg-green-50', 'text-green-700', 'ring-green-200');
                badge.innerHTML = '<span class="relative flex h-2 w-2"><span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-500 opacity-75"></span><span class="relative inline-flex h-2 w-2 rounded-full bg-green-600"></span></span>Open now';
            } else {
                badge.classList.add('bg-slate-100', 'text-slate-600', 'ring-slate-300');
                badge.innerHTML = '<span class="h-2 w-2 rounded-full bg-slate-400"></span>Closed now';
            }
        } catch (e) {}
    })();
</script>

</body>
</html>