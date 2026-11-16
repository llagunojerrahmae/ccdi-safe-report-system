<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SafeReport</title>
    @vite('resources/css/app.css')
    <style>
        html { scroll-behavior: smooth; }
        .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.show { opacity: 1; transform: none; }
        .panel-enter { animation: panelIn .35s ease both; }
        @keyframes panelIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
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
            <a href="{{ route('about') }}" class="hover:text-white transition text-yellow-400 font-bold">About</a>
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
    </div>
</nav>

<!-- Content -->
<div class="bg-gradient-to-b from-blue-100/70 via-blue-50/40 to-slate-50">
<div class="max-w-3xl mx-auto px-6 pt-14 pb-20">

    <!-- Title -->
    <div class="text-center mb-8 reveal">
        <h2 class="text-blue-950 font-extrabold text-3xl md:text-4xl tracking-wide mt-5">ABOUT SAFEREPORT<span class="text-red-600">.</span></h2>
        <div class="w-14 h-1 bg-red-600 rounded-full mx-auto mt-3"></div>
        <p class="text-slate-500 text-sm mt-4">Tap a topic below to jump straight to it.</p>
    </div>

    <!-- Quick jump chips -->
    <div class="flex flex-wrap justify-center gap-2 mb-10 reveal" id="jump-chips">
        <a href="#who" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-900 hover:bg-blue-950 hover:text-white">Who We Are</a>
        <a href="#how" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-900 hover:bg-blue-950 hover:text-white">How It Works</a>
        <a href="#faculty" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-900 hover:bg-blue-950 hover:text-white">For Faculty</a>
        <a href="#protect" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-900 hover:bg-blue-950 hover:text-white">Privacy</a>
        <a href="#faq" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-blue-900 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-900 hover:bg-blue-950 hover:text-white">FAQ</a>
    </div>

    <div class="space-y-6">

        <!-- Who We Are -->
        <div id="who" class="reveal scroll-mt-24 bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-blue-950 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">Who We Are</h3>
            <p>
                SafeReport is a web-based anonymous incident and threat reporting system of the
                Computer Communication Development Institute (CCDI). It gives CCDI students
                a safe and confidential way to report incidents, threats, and safety concerns within the school,
                without fear of their identity being revealed.
            </p>
            <p class="mt-3">
                The system offers an additional way to report besides approaching a teacher or the Disciplinary Office
                in person, which some students avoid because of fear, embarrassment, or concern about
                retaliation. It is a simple online form that students can use from any device with an
                internet connection. It does not replace the existing disciplinary processes of CCDI.
            </p>
            <p class="mt-3">
                Verified CCDI faculty members also take part in the system. They serve as helpers of the
                administrator by reviewing reports and leaving notes on what is being done.
            </p>
        </div>

        <!-- Why SafeReport -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-red-600 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">Why We Built SafeReport</h3>
            <p>
                Many incidents in schools, such as bullying, harassment, theft, vandalism, and threats, go
                unreported because students are afraid to speak up. When concerns are not reported, they cannot
                be addressed, and the school community becomes less safe.
            </p>
            <p class="mt-3">
                SafeReport was created to remove that barrier. By making reporting anonymous, fast, and
                trackable, the system encourages more students to come forward and helps authorized school
                personnel respond to concerns on time.
            </p>
        </div>

        <!-- Mission and Vision -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 text-slate-600 text-sm leading-relaxed transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                    </svg>
                </div>
                <h3 class="text-blue-950 font-bold text-lg mb-2">Our Mission</h3>
                <p>
                    To provide a simple, secure, and anonymous channel for reporting incidents, so that every
                    concern is heard and acted on by authorized personnel without exposing the identity of the reporter.
                </p>
            </div>

            <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 text-slate-600 text-sm leading-relaxed transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-11 h-11 rounded-full bg-red-100 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-blue-950 font-bold text-lg mb-2">Our Vision</h3>
                <p>
                    A safe and supportive school community where students feel confident to speak up, and
                    where concerns are handled with care, fairness, and confidentiality.
                </p>
            </div>
        </div>

        <!-- How it works (interactive tabs) -->
        <div id="how" class="reveal scroll-mt-24 bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8">
            <h3 class="text-blue-950 font-bold text-lg">How SafeReport Works</h3>
            <p class="text-slate-500 text-sm mt-1">Choose a role to see what each person does in the system.</p>

            <div class="mt-5 grid grid-cols-3 gap-2 rounded-2xl bg-slate-100 p-1.5" role="tablist" id="role-tabs">
                <button type="button" role="tab" data-tab="student" class="role-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Student</button>
                <button type="button" role="tab" data-tab="faculty" class="role-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Faculty</button>
                <button type="button" role="tab" data-tab="admin" class="role-tab rounded-xl px-3 py-2.5 text-xs sm:text-sm font-bold transition">Admin</button>
            </div>

            <!-- Student -->
            <ol data-panel="student" class="mt-6 space-y-4 text-sm text-slate-600">
                <li class="flex gap-4"><span class="step-num">1</span><div><p class="font-bold text-blue-950">Fill out the report form</p><p class="mt-0.5">Choose the incident type, enter the location, and describe what happened. No name or account is needed.</p></div></li>
                <li class="flex gap-4"><span class="step-num">2</span><div><p class="font-bold text-blue-950">Attach evidence (optional)</p><p class="mt-0.5">Add photos or screenshots to support your report.</p></div></li>
                <li class="flex gap-4"><span class="step-num">3</span><div><p class="font-bold text-blue-950">Save your tracking code</p><p class="mt-0.5">Every report gets a tracking code. Keep it, because it is the only way to check your report later.</p></div></li>
                <li class="flex gap-4"><span class="step-num">4</span><div><p class="font-bold text-blue-950">Track the status</p><p class="mt-0.5">Use the code on the <a href="{{ route('report.track') }}" class="text-blue-700 font-semibold underline hover:text-blue-900">Track Report</a> page to see if it is pending, being reviewed, or resolved.</p></div></li>
            </ol>

            <!-- Faculty -->
            <ol data-panel="faculty" class="mt-6 hidden space-y-4 text-sm text-slate-600">
                <li class="flex gap-4"><span class="step-num">1</span><div><p class="font-bold text-blue-950">Request a faculty account</p><p class="mt-0.5">Faculty members sign up for an account. Anyone can ask, but not everyone gets in.</p></div></li>
                <li class="flex gap-4"><span class="step-num">2</span><div><p class="font-bold text-blue-950">Get verified</p><p class="mt-0.5">The administrator checks that you are real CCDI faculty. You can log in only after you are approved.</p></div></li>
                <li class="flex gap-4"><span class="step-num">3</span><div><p class="font-bold text-blue-950">Get notified of new reports</p><p class="mt-0.5">When a student submits a report, faculty are notified so someone can look into it quickly.</p></div></li>
                <li class="flex gap-4"><span class="step-num">4</span><div><p class="font-bold text-blue-950">Leave a note for the admin</p><p class="mt-0.5">Add a note and mark where things stand, so the admin can see the progress on the report.</p></div></li>
            </ol>

            <!-- Admin -->
            <ol data-panel="admin" class="mt-6 hidden space-y-4 text-sm text-slate-600">
                <li class="flex gap-4"><span class="step-num">1</span><div><p class="font-bold text-blue-950">Receive and review reports</p><p class="mt-0.5">All reports arrive in one organized dashboard with their evidence.</p></div></li>
                <li class="flex gap-4"><span class="step-num">2</span><div><p class="font-bold text-blue-950">Read faculty notes</p><p class="mt-0.5">New notes from faculty are highlighted so none of them are missed.</p></div></li>
                <li class="flex gap-4"><span class="step-num">3</span><div><p class="font-bold text-blue-950">Set status and priority</p><p class="mt-0.5">Mark a report as pending, reviewing, resolved, or dismissed, and set its risk level.</p></div></li>
                <li class="flex gap-4"><span class="step-num">4</span><div><p class="font-bold text-blue-950">Approve faculty and archive</p><p class="mt-0.5">Verify faculty requests, and move finished reports to the archive. They can be restored later.</p></div></li>
            </ol>
        </div>

        <!-- Faculty section -->
        <div id="faculty" class="reveal scroll-mt-24 relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 p-7 md:p-8 text-blue-100 shadow-xl shadow-blue-950/10">
            <div class="absolute -right-12 -top-12 h-44 w-44 rounded-full bg-red-600/20 blur-2xl"></div>
            <div class="relative">
                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-blue-200 ring-1 ring-white/20">For Faculty</span>
                <h3 class="mt-3 text-white font-extrabold text-xl">Faculty are our helpers on the ground.</h3>
                <p class="mt-2 text-sm leading-relaxed">
                    Faculty members support the administrator in looking into reports. You do not have to wait for the
                    admin to reach you. You are notified when students submit reports, and you can leave notes on
                    what you found or what you are doing about it.
                </p>

                <p class="mt-5 text-xs font-bold uppercase tracking-wider text-blue-300">Tap a status to see what it means</p>
                <div class="mt-2 flex flex-wrap gap-2" id="status-chips">
                    <button type="button" data-status="reviewing" class="status-chip rounded-full bg-white/10 px-4 py-2 text-xs font-bold text-white ring-1 ring-white/25 transition hover:bg-white/20">Reviewing</button>
                    <button type="button" data-status="handling" class="status-chip rounded-full bg-white/10 px-4 py-2 text-xs font-bold text-white ring-1 ring-white/25 transition hover:bg-white/20">Faculty will handle this</button>
                    <button type="button" data-status="resolved" class="status-chip rounded-full bg-white/10 px-4 py-2 text-xs font-bold text-white ring-1 ring-white/25 transition hover:bg-white/20">Resolved by faculty</button>
                </div>
                <div id="status-desc" class="mt-3 min-h-[3.25rem] rounded-xl bg-white/10 px-4 py-3 text-sm ring-1 ring-white/15">
                    Pick a status above.
                </div>

                <ul class="mt-6 space-y-2.5 text-sm">
                    <li class="flex gap-2.5"><svg class="mt-0.5 h-5 w-5 shrink-0 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Every faculty account is verified by the administrator before it can log in.</li>
                    <li class="flex gap-2.5"><svg class="mt-0.5 h-5 w-5 shrink-0 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Your notes go straight to the administrator, who sees new ones highlighted.</li>
                </ul>

                <a href="{{ route('faculty.login') }}"
                   class="mt-6 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-red-600 to-red-700 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-red-900/30 transition hover:from-red-700 hover:to-red-800">
                    Faculty Login
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>
        </div>

        <!-- Objectives -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-4">What SafeReport Aims to Do</h3>
            <ul class="space-y-3">
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-red-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Provide an anonymous way for CCDI students to report incidents, threats, and safety concerns.</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-red-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Allow students to attach supporting evidence, such as screenshots or photos, to their report.</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-red-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Give every report a tracking code so its status can be checked without revealing identity.</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-red-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Help authorized CCDI personnel receive, review, prioritize, and update the status of reports in one organized place.</span>
                </li>
                <li class="flex gap-3">
                    <svg class="w-5 h-5 shrink-0 text-red-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Let verified faculty members support the administrator by reviewing reports and leaving notes.</span>
                </li>
            </ul>
        </div>

        <!-- Core Values -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm">
            <h3 class="text-blue-950 font-bold text-lg mb-5 text-center">What We Value</h3>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Anonymity</p>
                    <p class="text-xs mt-1">No name, account, or personal details are required.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Safety</p>
                    <p class="text-xs mt-1">A safer school environment for students.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="w-11 h-11 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Action</p>
                    <p class="text-xs mt-1">Reports go straight to authorized personnel for response.</p>
                </div>
            </div>
        </div>

        <!-- How We Protect You -->
        <div id="protect" class="reveal scroll-mt-24 bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-blue-950 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">How We Protect Reporters</h3>
            <p>
                SafeReport collects only the information needed to process a report: the incident type,
                location, description, and any evidence you choose to attach. It does not ask for your name,
                student number, or email address. Reports are viewed only by authorized personnel.
            </p>
            <p class="mt-3">
                To protect yourself further, avoid including names or details in your description that could
                identify you, unless you choose to. You can read more in our
                <a href="{{ route('terms') }}" class="text-blue-700 font-semibold underline hover:text-blue-900">Terms and Conditions</a>.
            </p>
        </div>

        <!-- What Can Be Reported -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-red-600 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">What Can Be Reported</h3>
            <p>Students may use SafeReport to report incidents, threats, and safety concerns within the school, such as:</p>
            <div class="flex flex-wrap gap-2 mt-4">
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Bullying (including cyberbullying)</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Harassment</span>
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Theft</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Possession of deadly weapons</span>
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Vandalism</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Other safety concerns</span>
            </div>
            <p class="mt-5 text-xs text-slate-500 bg-slate-50 border border-slate-100 rounded-xl px-4 py-3">
                SafeReport is not an emergency hotline. If someone is in immediate danger, contact school
                security or local authorities right away.
            </p>
        </div>

        <!-- FAQ (accordion) -->
        <div id="faq" class="reveal scroll-mt-24 bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8">
            <h3 class="text-blue-950 font-bold text-lg">Frequently Asked Questions</h3>
            <div class="mt-4 divide-y divide-slate-100" id="faq-list">

                <div class="faq-item">
                    <button type="button" class="faq-btn flex w-full items-center justify-between gap-4 py-4 text-left" aria-expanded="false">
                        <span class="text-sm font-semibold text-blue-950">Is my report really anonymous?</span>
                        <svg class="faq-icon h-5 w-5 shrink-0 text-red-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>
                    <div class="faq-body grid grid-rows-[0fr] transition-all duration-300">
                        <div class="overflow-hidden"><p class="pb-4 text-sm leading-relaxed text-slate-600">Yes. SafeReport does not ask for your name, student number, or email. You only provide the incident details and any evidence you choose to attach.</p></div>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-btn flex w-full items-center justify-between gap-4 py-4 text-left" aria-expanded="false">
                        <span class="text-sm font-semibold text-blue-950">How do I check my report later?</span>
                        <svg class="faq-icon h-5 w-5 shrink-0 text-red-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>
                    <div class="faq-body grid grid-rows-[0fr] transition-all duration-300">
                        <div class="overflow-hidden"><p class="pb-4 text-sm leading-relaxed text-slate-600">After you submit, you receive a tracking code. Enter it on the <a href="{{ route('report.track') }}" class="font-semibold text-blue-700 underline">Track Report</a> page to see the current status. Keep the code safe, since it is the only way to find your report.</p></div>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-btn flex w-full items-center justify-between gap-4 py-4 text-left" aria-expanded="false">
                        <span class="text-sm font-semibold text-blue-950">Who can see my report?</span>
                        <svg class="faq-icon h-5 w-5 shrink-0 text-red-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>
                    <div class="faq-body grid grid-rows-[0fr] transition-all duration-300">
                        <div class="overflow-hidden"><p class="pb-4 text-sm leading-relaxed text-slate-600">Only authorized personnel: the administrator and verified faculty members who help look into reports.</p></div>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-btn flex w-full items-center justify-between gap-4 py-4 text-left" aria-expanded="false">
                        <span class="text-sm font-semibold text-blue-950">I am a teacher. How do I get a faculty account?</span>
                        <svg class="faq-icon h-5 w-5 shrink-0 text-red-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>
                    <div class="faq-body grid grid-rows-[0fr] transition-all duration-300">
                        <div class="overflow-hidden"><p class="pb-4 text-sm leading-relaxed text-slate-600">Go to <a href="{{ route('faculty.login') }}" class="font-semibold text-blue-700 underline">Faculty Login</a> and request an account. The administrator verifies that you are CCDI faculty, and you can log in once you are approved.</p></div>
                    </div>
                </div>

                <div class="faq-item">
                    <button type="button" class="faq-btn flex w-full items-center justify-between gap-4 py-4 text-left" aria-expanded="false">
                        <span class="text-sm font-semibold text-blue-950">Can I use SafeReport in an emergency?</span>
                        <svg class="faq-icon h-5 w-5 shrink-0 text-red-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>
                    <div class="faq-body grid grid-rows-[0fr] transition-all duration-300">
                        <div class="overflow-hidden"><p class="pb-4 text-sm leading-relaxed text-slate-600">No. SafeReport is not an emergency hotline. If someone is in immediate danger, go directly to school security or the guidance office, or contact local authorities.</p></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Developers -->
        <div class="reveal bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">The Developer</h3>
            <p>
                SafeReport was developed by a 3rd year Bachelor of Science in Information Technology
                (BSIT) student as a project for the Software Engineering subject. The system was designed
                to apply what she learned about analyzing, designing, and building a real system that solves a
                real problem in our school.
            </p>
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

<style>
    .role-tab { color: #475569; }
    .role-tab:hover { color: #172554; }
    .role-tab.active { background: #172554; color: #fff; box-shadow: 0 4px 12px rgba(23,37,84,.25); }
    .step-num { display: flex; height: 2rem; width: 2rem; flex-shrink: 0; align-items: center; justify-content: center; border-radius: 9999px; background: #dc2626; color: #fff; font-size: .8rem; font-weight: 800; box-shadow: 0 0 0 4px #fee2e2; }
    .status-chip.active { background: #fff; color: #172554; }
    .faq-item.open .faq-body { grid-template-rows: 1fr; }
    .faq-item.open .faq-icon { transform: rotate(180deg); }
</style>

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

    // Role tabs
    (() => {
        const tabs = document.querySelectorAll('.role-tab');
        const panels = document.querySelectorAll('[data-panel]');
        function select(name) {
            tabs.forEach(t => {
                const on = t.dataset.tab === name;
                t.classList.toggle('active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            panels.forEach(p => {
                const on = p.dataset.panel === name;
                p.classList.toggle('hidden', !on);
                if (on) { p.classList.remove('panel-enter'); void p.offsetWidth; p.classList.add('panel-enter'); }
            });
        }
        tabs.forEach(t => t.addEventListener('click', () => select(t.dataset.tab)));
        select('student');

        if (location.hash === '#how-faculty') select('faculty');
    })();

    // Faculty status explainer
    (() => {
        const info = {
            reviewing: 'The faculty member is looking into the report and checking the details.',
            handling:  'The faculty member will take care of this report personally, so the admin knows it already has someone on it.',
            resolved:  'The faculty member dealt with the concern. The admin can then confirm and update the report status.'
        };
        const chips = document.querySelectorAll('.status-chip');
        const box = document.getElementById('status-desc');
        chips.forEach(c => c.addEventListener('click', () => {
            chips.forEach(x => x.classList.toggle('active', x === c));
            box.textContent = info[c.dataset.status];
            box.classList.remove('panel-enter'); void box.offsetWidth; box.classList.add('panel-enter');
        }));
    })();

    // FAQ accordion (one open at a time)
    (() => {
        const items = document.querySelectorAll('.faq-item');
        items.forEach(item => {
            const btn = item.querySelector('.faq-btn');
            btn.addEventListener('click', () => {
                const willOpen = !item.classList.contains('open');
                items.forEach(i => {
                    i.classList.remove('open');
                    i.querySelector('.faq-btn').setAttribute('aria-expanded', 'false');
                });
                if (willOpen) {
                    item.classList.add('open');
                    btn.setAttribute('aria-expanded', 'true');
                }
            });
        });
    })();
</script>

</body>
</html>