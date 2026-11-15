<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center px-6 py-12">

<div class="w-full max-w-4xl">

    <!-- Header -->
    <div class="text-center mb-8">
        <div class="w-16 h-16 mx-auto rounded-full border-2 border-red-600 flex items-center justify-center bg-white shadow-md overflow-hidden">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-full h-full object-cover">
        </div>
        <h1 class="text-blue-950 font-extrabold text-2xl mt-4">About SafeReport</h1>
        <p class="text-slate-500 text-sm mt-1">Computer Communication Development Institute</p>
    </div>

    <div class="space-y-6">

        <!-- Who We Are -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-2">Who We Are</h2>
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
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-2">Why We Built SafeReport</h2>
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
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                    </svg>
                </div>
                <h2 class="text-blue-950 font-bold text-lg mb-2">Our Mission</h2>
                <p>
                    To provide a simple, secure, and anonymous channel for reporting incidents, so that every
                    concern is heard and acted on by authorized personnel without exposing the identity of the reporter.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h2 class="text-blue-950 font-bold text-lg mb-2">Our Vision</h2>
                <p>
                    A safe and supportive school community where students feel confident to speak up, and
                    where concerns are handled with care, fairness, and confidentiality.
                </p>
            </div>
        </div>

        <!-- Objectives -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-3">What SafeReport Aims to Do</h2>
            <ul class="space-y-2">
                <li class="flex gap-3">
                    <span class="mt-1.5 w-2 h-2 shrink-0 rounded-full bg-red-600"></span>
                    <span>Provide an anonymous way for CCDI students to report incidents, threats, and safety concerns.</span>
                </li>
                <li class="flex gap-3">
                    <span class="mt-1.5 w-2 h-2 shrink-0 rounded-full bg-red-600"></span>
                    <span>Allow students to attach supporting evidence, such as screenshots or photos, to their report.</span>
                </li>
                <li class="flex gap-3">
                    <span class="mt-1.5 w-2 h-2 shrink-0 rounded-full bg-red-600"></span>
                    <span>Give every report a tracking code so its status can be checked without revealing identity.</span>
                </li>
                <li class="flex gap-3">
                    <span class="mt-1.5 w-2 h-2 shrink-0 rounded-full bg-red-600"></span>
                    <span>Help authorized CCDI personnel receive, review, prioritize, and update the status of reports in one organized place.</span>
                </li>
            </ul>
        </div>

        <!-- Core Values -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm">
            <h2 class="text-blue-950 font-bold text-lg mb-4 text-center">What We Value</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Anonymity</p>
                    <p class="text-xs mt-1">No name, account, or personal details are required.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Safety</p>
                    <p class="text-xs mt-1">A safer school environment for students.</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-5 text-center border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-blue-950 font-bold mt-3">Action</p>
                    <p class="text-xs mt-1">Reports go straight to authorized personnel for response.</p>
                </div>
            </div>
        </div>

        <!-- How We Protect You -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-2">How We Protect Reporters</h2>
            <p>
                SafeReport collects only the information needed to process a report: the incident type,
                location, description, and any evidence you choose to attach. It does not ask for your name,
                student number, or email address. Reports are viewed only by authorized personnel.
            </p>
            <p class="mt-3">
                To protect yourself further, avoid including names or details in your description that could
                identify you, unless you choose to. You can read more in our
                <a href="{{ route('terms') }}" class="text-blue-700 underline hover:text-blue-900">Terms and Conditions</a>.
            </p>
        </div>

        <!-- What Can Be Reported -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-2">What Can Be Reported</h2>
            <p>Students may use SafeReport to report incidents, threats, and safety concerns within the school, such as:</p>
            <div class="flex flex-wrap gap-2 mt-3">
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Bullying (including cyberbullying)</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Harassment</span>
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Theft</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Possession of deadly weapons</span>
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1.5 rounded-full">Vandalism</span>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1.5 rounded-full">Other safety concerns</span>
            </div>
            <p class="mt-4 text-xs text-slate-500">
                SafeReport is not an emergency hotline. If someone is in immediate danger, contact school
                security or local authorities right away.
            </p>
        </div>

        <!-- Developers -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm leading-relaxed">
            <h2 class="text-blue-950 font-bold text-lg mb-2">The Developers</h2>
            <p>
                SafeReport was developed by a group of 3rd year Bachelor of Science in Information Technology
                (BSIT) students as a project for the Software Engineering subject. The system was designed
                to apply what we learned about analyzing, designing, and building a real system that solves a
                real problem in our school.
            </p>
        </div>

        <!-- Call to Action -->
        <div class="bg-gradient-to-r from-blue-950 to-blue-900 rounded-2xl shadow-xl p-8 text-center">
            <h2 class="text-white font-extrabold text-xl">Have a concern? Speak up safely.</h2>
            <p class="text-blue-200 text-sm mt-2">Your report is anonymous and goes directly to authorized school personnel.</p>
            <div class="mt-5 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ url('/') }}#report-section"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition">
                    Submit a Report
                </a>
                <a href="{{ route('report.track') }}"
                   class="inline-flex items-center gap-2 border-2 border-blue-300 text-white hover:bg-white hover:text-blue-900 font-semibold px-6 py-3 rounded-xl transition">
                    Track Your Report
                </a>
            </div>
        </div>

    </div>

    <div class="text-center mt-6">
        <a href="{{ url('/') }}" class="text-blue-700 hover:text-blue-900 text-sm font-semibold">&larr; Back to Home</a>
    </div>
</div>

</body>
</html>