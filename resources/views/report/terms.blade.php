<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans antialiased">

@php
    $contactLink = '<a href="' . route('contact') . '" class="text-blue-700 font-semibold underline hover:text-blue-900">Contact page</a>';

    $studentTerms = [
        ['title' => 'Acceptance of Terms',
         'body' => 'By using SafeReport, you agree to these Terms and Conditions. If you do not agree, please do not submit a report through this system.'],
        ['title' => 'Purpose of the System',
         'body' => 'SafeReport is a web-based system of the Computer Communication Development Institute (CCDI) that allows CCDI students to report incidents, threats, and safety concerns within the school safely and confidentially.'],
        ['title' => 'Anonymity and Confidentiality',
         'body' => 'SafeReport does not require your name or personal details to submit a report. Reports are accessible only to authorized school personnel and will be used only to investigate and respond to the concern. Please do not include personal information that could identify you unless you choose to.'],
        ['title' => 'Responsible Use',
         'body' => 'You agree to submit only truthful and good-faith reports. The following are prohibited:',
         'list' => [
             'False, malicious, or prank reports',
             'Harassment, defamation, or targeting of individuals without basis',
             'Spam, repeated submissions, or attempts to disrupt or hack the system',
             'Uploading harmful files or inappropriate content',
         ]],
        ['title' => 'Report Handling',
         'body' => 'Submitted reports are reviewed by authorized CCDI personnel. SafeReport does not replace the existing disciplinary processes of CCDI, and any investigation or action remains with authorized personnel. Submission does not guarantee a specific outcome or response time. Each report receives a tracking code that you may use in the "Track Report" page to check its status. Keep this code safe, as it cannot be recovered if lost.'],
        ['title' => 'Emergencies', 'highlight' => true,
         'body' => 'SafeReport is not an emergency hotline. If someone is in immediate danger, contact school security or local authorities right away.'],
        ['title' => 'Data Collected and Stored',
         'body' => 'The system stores only the information needed to process the report: incident type, description, date/time of submission, and any attachments you provide. Data is kept secure and is not shared with third parties, except when required by law or school policy.'],
        ['title' => 'Misuse and Consequences',
         'body' => 'Reports found to be intentionally false or abusive may be subject to disciplinary action in accordance with CCDI policies.'],
        ['title' => 'Changes to These Terms',
         'body' => 'CCDI may update these Terms at any time. Continued use of the system means you accept the updated Terms.'],
        ['title' => 'Contact',
         'body' => 'For questions about these Terms, please visit the ' . $contactLink . ' or reach authorized CCDI personnel.'],
    ];

    $facultyTerms = [
        ['title' => 'Authorized Access',
         'body' => 'The Faculty Login is intended only for authorized CCDI faculty and personnel. Your account is personal: do not share your credentials, and always log out when using a shared or public device. Any activity under your account is your responsibility.'],
        ['title' => 'Confidentiality of Reports',
         'body' => 'All reports and attachments viewed through SafeReport are confidential. Do not disclose their contents to unauthorized persons, and share information only on a need-to-know basis in accordance with CCDI policies.'],
        ['title' => 'Protecting the Reporter',
         'body' => 'Reports may be anonymous. You must not attempt to identify, trace, or pressure a reporter, and you must not retaliate against anyone for submitting a good-faith report.'],
        ['title' => 'Responsible Handling of Reports',
         'body' => 'When handling a report, you agree to:',
         'list' => [
             'Review reports promptly, fairly, and without prejudging anyone involved',
             'Keep the report status and remarks accurate and up to date',
             'Act only within your authorized role and CCDI disciplinary procedures',
             'Record actions taken so that they can be reviewed if needed',
         ]],
        ['title' => 'Urgent and Emergency Concerns', 'highlight' => true,
         'body' => 'If a report indicates immediate danger, do not wait for normal processing. Escalate right away to school security, the guidance office, or local authorities. SafeReport is not an emergency hotline.'],
        ['title' => 'Data Use and Protection',
         'body' => 'Access report data only for the purpose of handling the concern. Do not copy, download, forward, or post reports or attachments outside the system or outside authorized channels. Handle all data in line with the Data Privacy Act of 2012 (RA 10173) and CCDI policy.'],
        ['title' => 'Misuse and Consequences',
         'body' => 'Unauthorized access, disclosure, tampering with reports, or retaliation against a reporter may result in disciplinary action under CCDI policies and may carry liability under applicable laws.'],
        ['title' => 'Changes and Contact',
         'body' => 'CCDI may update these Terms at any time. Continued use of the Faculty Login means you accept the updated Terms. For questions, visit the ' . $contactLink . ' or reach the system administrator.'],
    ];

    $groups = ['students' => $studentTerms, 'faculty' => $facultyTerms];
@endphp

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
            <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
            <a href="{{ route('terms') }}" class="hover:text-white transition text-yellow-400 font-bold">Terms</a>
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
    <div class="text-center mb-8">
        <h2 class="text-blue-950 font-extrabold text-3xl md:text-4xl tracking-wide mt-5">TERMS AND CONDITIONS<span class="text-red-600">.</span></h2>
        <div class="w-14 h-1 bg-red-600 rounded-full mx-auto mt-3"></div>
        <p class="text-slate-500 text-sm mt-3">Last updated: November 16, 2026</p>
    </div>

    <!-- Tabs -->
    <div class="flex justify-center mb-6">
        <div role="tablist" class="inline-flex bg-white border border-slate-200 rounded-xl p-1 shadow-sm">
            <button type="button" role="tab" id="tab-students" data-tab="students" aria-selected="true"
                    class="terms-tab px-6 py-2 rounded-lg text-sm font-semibold transition">
                For Students
            </button>
            <button type="button" role="tab" id="tab-faculty" data-tab="faculty" aria-selected="false"
                    class="terms-tab px-6 py-2 rounded-lg text-sm font-semibold transition">
                For Faculty
            </button>
        </div>
    </div>

    <!-- Terms panels -->
    @foreach ($groups as $key => $terms)
    <div id="panel-{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}" class="terms-panel {{ $key === 'students' ? '' : 'hidden' }}">
        <div class="bg-white rounded-2xl shadow-lg shadow-blue-950/5 border border-slate-200 border-t-4 border-t-blue-950 overflow-hidden">
            <div class="divide-y divide-slate-100 text-slate-600 text-sm leading-relaxed">
                @foreach ($terms as $term)
                <div class="flex gap-4 p-6 md:p-7 {{ !empty($term['highlight']) ? 'bg-red-50/70' : '' }}">
                    <span class="w-9 h-9 shrink-0 rounded-full {{ $loop->iteration % 2 === 1 ? 'bg-blue-950' : 'bg-red-600' }} text-white text-sm font-bold flex items-center justify-center">{{ $loop->iteration }}</span>
                    <div class="min-w-0">
                        <h3 class="text-blue-950 font-bold text-base mb-1">{{ $term['title'] }}</h3>
                        <p>{!! $term['body'] !!}</p>
                        @if (!empty($term['list']))
                        <ul class="mt-3 space-y-2">
                            @foreach ($term['list'] as $item)
                            <li class="flex gap-3">
                                <span class="mt-1.5 w-2 h-2 shrink-0 rounded-full bg-red-600"></span>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <!-- Back -->
    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
        <a href="{{ route('home') }}#report-section"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-red-600/30 transition">
            Submit a Report
        </a>
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 border-2 border-blue-950 text-blue-950 hover:bg-blue-950 hover:text-white font-semibold px-6 py-3 rounded-xl transition">
            &larr; Back to Home
        </a>
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
    (function () {
        var tabs = document.querySelectorAll('.terms-tab');
        var panels = document.querySelectorAll('.terms-panel');
        var active = ['bg-blue-950', 'text-white', 'shadow'];
        var inactive = ['text-slate-600', 'hover:bg-slate-100'];

        function show(name) {
            tabs.forEach(function (t) {
                var on = t.dataset.tab === name;
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                active.forEach(function (c) { t.classList.toggle(c, on); });
                inactive.forEach(function (c) { t.classList.toggle(c, !on); });
            });
            panels.forEach(function (p) {
                p.classList.toggle('hidden', p.id !== 'panel-' + name);
            });
            try { history.replaceState(null, '', '#' + name); } catch (e) {}
        }

        tabs.forEach(function (t) {
            t.addEventListener('click', function () { show(t.dataset.tab); });
        });

        // Open the right tab from the URL, e.g. /terms#faculty
        var hash = location.hash.replace('#', '');
        show(hash === 'faculty' ? 'faculty' : 'students');
    })();
</script>

</body>
</html>