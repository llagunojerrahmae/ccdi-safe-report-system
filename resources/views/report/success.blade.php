<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Submitted - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen px-4">

    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full text-center border border-slate-200">
        
        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4 text-emerald-600">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-800">Report Successfully Submitted!</h2>
        <p class="text-slate-500 text-sm mt-2">I-save ang iyong Tracking Code para masubaybayan ang status ng iyong report.</p>

        <!-- Tracking Code Display Box -->
        <div class="bg-slate-100 border-2 border-dashed border-slate-300 rounded-xl p-4 my-6">
            <span class="text-xs text-slate-400 font-bold uppercase tracking-wider block mb-1">Your Tracking Code</span>
            <span class="text-3xl font-black text-blue-900 tracking-widest select-all">
                {{ $report->tracking_code }}
            </span>
        </div>

        <div class="space-y-3">
            <a href="{{ route('report.track') }}?tracking_code={{ $report->tracking_code }}" 
               class="block w-full bg-blue-900 hover:bg-blue-950 text-white font-bold py-3.5 rounded-xl transition">
                Track Status Now
            </a>
            
            <a href="{{ route('report.create') }}" 
               class="block w-full text-slate-500 hover:text-slate-700 text-sm font-semibold">
                Submit Another Report
            </a>
        </div>
    </div>

</body>
</html>