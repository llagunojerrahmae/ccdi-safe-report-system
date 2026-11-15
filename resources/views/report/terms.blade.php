<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center px-6 py-12">

<div class="w-full max-w-3xl">
    <div class="text-center mb-8">
        <!-- Logo Image Container -->
        <div class="w-16 h-16 mx-auto rounded-full border-2 border-red-600 flex items-center justify-center bg-white shadow-md overflow-hidden">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-full h-full object-cover">
        </div>
        <h1 class="text-blue-950 font-extrabold text-2xl mt-4">Terms and Conditions</h1>
        <p class="text-slate-500 text-sm mt-1">Last updated: October 18, 2026</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 space-y-6 text-slate-600 text-sm leading-relaxed">

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">1. Acceptance of Terms</h2>
            <p>By using SafeReport, you agree to these Terms and Conditions. If you do not agree, please do not submit a report through this system.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">2. Purpose of the System</h2>
            <p>SafeReport is a web-based system of the Computer Communication Development Institute (CCDI) that allows CCDI students to report incidents, threats, and safety concerns within the school safely and confidentially.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">3. Anonymity and Confidentiality</h2>
            <p>SafeReport does not require your name or personal details to submit a report. Reports are accessible only to authorized school personnel and will be used only to investigate and respond to the concern. Please do not include personal information that could identify you unless you choose to.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">4. Responsible Use</h2>
            <p class="mb-2">You agree to submit only truthful and good-faith reports. The following are prohibited:</p>
            <ul class="list-disc pl-6 space-y-1">
                <li>False, malicious, or prank reports</li>
                <li>Harassment, defamation, or targeting of individuals without basis</li>
                <li>Spam, repeated submissions, or attempts to disrupt or hack the system</li>
                <li>Uploading harmful files or inappropriate content</li>
            </ul>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">5. Report Handling</h2>
            <p>Submitted reports are reviewed by authorized CCDI personnel. SafeReport does not replace the existing disciplinary processes of CCDI, and any investigation or action remains with authorized personnel. Submission does not guarantee a specific outcome or response time. Each report receives a tracking code that you may use in the "Track Report" page to check its status. Keep this code safe, as it cannot be recovered if lost.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">6. Emergencies</h2>
            <p>SafeReport is not an emergency hotline. If someone is in immediate danger, contact school security or local authorities right away.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">7. Data Collected and Stored</h2>
            <p>The system stores only the information needed to process the report: incident type, description, date/time of submission, and any attachments you provide. Data is kept secure and is not shared with third parties, except when required by law or school policy.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">8. Misuse and Consequences</h2>
            <p>Reports found to be intentionally false or abusive may be subject to disciplinary action in accordance with CCDI policies.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">9. Changes to These Terms</h2>
            <p>CCDI may update these Terms at any time. Continued use of the system means you accept the updated Terms.</p>
        </div>

        <div>
            <h2 class="text-blue-950 font-bold text-base mb-1">10. Contact</h2>
            <p>For questions about these Terms, please visit the Contact page or reach authorized CCDI personnel.</p>
        </div>
    </div>

    <div class="text-center mt-6">
        <a href="{{ url('/') }}" class="text-blue-700 hover:text-blue-900 text-sm font-semibold">&larr; Back to Home</a>
    </div>
</div>

</body>
</html>