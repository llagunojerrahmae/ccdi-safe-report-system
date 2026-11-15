<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SafeReport</title>
    @vite('resources/css/app.css')
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
    <div class="text-center mb-10">
        <h2 class="text-blue-950 font-extrabold text-3xl md:text-4xl tracking-wide mt-5">ABOUT SAFEREPORT<span class="text-red-600">.</span></h2>
        <div class="w-14 h-1 bg-red-600 rounded-full mx-auto mt-3"></div>
    </div>

    <div class="space-y-6">

        <!-- Who We Are -->
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-blue-950 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
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
        </div>

        <!-- Why SafeReport -->
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-red-600 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
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
            <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 text-slate-600 text-sm leading-relaxed">
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

            <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 text-slate-600 text-sm leading-relaxed">
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

        <!-- Objectives -->
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
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
            </ul>
        </div>

        <!-- Core Values -->
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm">
            <h3 class="text-blue-950 font-bold text-lg mb-5 text-center">What We Value</h3>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
                    <div class="w-11 h-11 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Anonymity</p>
                    <p class="text-xs mt-1">No name, account, or personal details are required.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
                    <div class="w-11 h-11 mx-auto rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Safety</p>
                    <p class="text-xs mt-1">A safer school environment for students.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
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
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-blue-950 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
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
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-l-4 border-l-red-600 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
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

        <!-- Developers -->
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 p-7 md:p-8 text-slate-600 text-sm leading-relaxed">
            <h3 class="text-blue-950 font-bold text-lg mb-3">The Developers</h3>
            <p>
                SafeReport was developed by a group of 3rd year Bachelor of Science in Information Technology
                (BSIT) students as a project for the Software Engineering subject. The system was designed
                to apply what we learned about analyzing, designing, and building a real system that solves a
                real problem in our school.
            </p>
        </div>

        <!-- Call to Action -->
        <div class="bg-gradient-to-b from-blue-950 to-blue-800 rounded-2xl shadow-xl shadow-blue-950/10 p-8 text-center">
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

</body>
</html>