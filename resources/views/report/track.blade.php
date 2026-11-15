<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Report - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center px-6 py-12">

<div class="w-full max-w-lg">
    <div class="text-center mb-8">
        <!-- Logo Image Container -->
        <div class="w-16 h-16 mx-auto rounded-full border-2 border-red-600 flex items-center justify-center bg-white shadow-md overflow-hidden">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-full h-full object-cover">
        </div>
        <h1 class="text-blue-950 font-extrabold text-2xl mt-4">Track Your Report</h1>
        <p class="text-slate-500 text-sm mt-1">Enter the tracking code you received after submitting.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100">
        <form action="{{ route('report.track.result') }}" method="POST" class="flex gap-3">
            @csrf
            <input type="text" name="tracking_code" required placeholder="SR-2026-00147"
                value="{{ old('tracking_code') }}"
                class="flex-1 rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm uppercase">
            <button type="submit"
                class="bg-blue-950 hover:bg-blue-900 text-white font-bold px-6 rounded-lg transition">
                Check
            </button>
        </form>

        @if (isset($searched))
            <div class="mt-6 pt-6 border-t border-slate-100">
                @if ($report)
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'reviewing' => 'bg-blue-100 text-blue-700',
                            'resolved' => 'bg-green-100 text-green-700',
                            'dismissed' => 'bg-slate-200 text-slate-600',
                        ];
                    @endphp
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-slate-500">Tracking Code</span>
                        <span class="font-bold text-blue-900">{{ $report->tracking_code }}</span>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-slate-500">Incident Type</span>
                        <span class="font-semibold text-slate-800 capitalize">{{ $report->incident_type }}</span>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-slate-500">Date Submitted</span>
                        <span class="font-semibold text-slate-800">{{ $report->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-slate-500">Status</span>
                        <span class="text-xs font-bold px-3 py-1 rounded-full uppercase {{ $statusColors[$report->status] ?? 'bg-slate-100 text-slate-700' }}">
                            {{ $report->status }}
                        </span>
                    </div>
                    @if ($report->admin_notes)
                        <div class="bg-slate-50 rounded-lg p-4 text-sm text-slate-600">
                            <p class="font-semibold text-slate-700 mb-1">Update from Admin:</p>
                            {{ $report->admin_notes }}
                        </div>
                    @endif
                @else
                    <p class="text-center text-red-600 text-sm">No report found with that tracking code. Please check and try again.</p>
                @endif
            </div>
        @endif
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('report.create') }}" class="text-sm text-blue-800 hover:underline">&larr; Back to SafeReport</a>
    </div>
</div>

</body>
</html>