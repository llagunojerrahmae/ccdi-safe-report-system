<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report {{ $report->tracking_code }} - SafeReport Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 min-h-screen p-8">

<div class="max-w-3xl mx-auto">
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-800 hover:underline">&larr; Back to Dashboard</a>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 mt-4">
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="text-xs uppercase text-slate-400 font-semibold">Tracking Code</p>
                <h2 class="text-2xl font-extrabold text-blue-950">{{ $report->tracking_code }}</h2>
            </div>
            <span class="text-xs font-bold px-3 py-1 rounded-full uppercase bg-slate-100 text-slate-600">
                {{ $report->created_at->format('M d, Y - h:i A') }}
            </span>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-xs uppercase text-slate-400 font-semibold mb-1">Incident Type</p>
                <p class="text-slate-800 font-semibold capitalize">{{ $report->incident_type }}</p>
            </div>
            <div>
                <p class="text-xs uppercase text-slate-400 font-semibold mb-1">Location</p>
                <p class="text-slate-800 font-semibold">{{ $report->location }}</p>
            </div>
        </div>

        <div class="mb-6">
            <p class="text-xs uppercase text-slate-400 font-semibold mb-1">Description</p>
            <p class="text-slate-700 leading-relaxed">{{ $report->description }}</p>
        </div>

        @if ($report->evidence_paths)
            <div class="mb-6">
                <p class="text-xs uppercase text-slate-400 font-semibold mb-2">Evidence</p>
                <div class="flex gap-3 flex-wrap">
                    @foreach ($report->evidence_paths as $path)
                        <a href="{{ Storage::url($path) }}" target="_blank" class="text-blue-700 text-sm hover:underline">
                            {{ basename($path) }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="{{ route('admin.reports.update', $report) }}" method="POST" class="border-t border-slate-100 pt-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status</label>
                <select name="status" class="w-full rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm">
                    <option value="pending" @selected($report->status === 'pending')>Pending</option>
                    <option value="reviewing" @selected($report->status === 'reviewing')>Reviewing</option>
                    <option value="resolved" @selected($report->status === 'resolved')>Resolved</option>
                    <option value="dismissed" @selected($report->status === 'dismissed')>Dismissed</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Notes (visible to reporter when they track)</label>
                <textarea name="admin_notes" rows="3"
                    class="w-full rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm">{{ $report->admin_notes }}</textarea>
            </div>

            <button type="submit"
                class="bg-blue-950 hover:bg-blue-900 text-white font-bold px-6 py-2.5 rounded-lg transition text-sm">
                Save Changes
            </button>
        </form>

        <!-- Priority Level (separate form) -->
        <form action="{{ route('admin.reports.priority', $report) }}" method="POST" class="border-t border-slate-100 pt-6 mt-6">
            @csrf
            @method('PATCH')

            <label for="priority" class="block text-sm font-semibold text-slate-700 mb-1.5">Priority Level</label>
            <div class="flex items-center gap-3">
                <select name="priority" id="priority" class="rounded-lg border-slate-300 focus:border-blue-700 focus:ring-blue-700 shadow-sm text-sm">
                    <option value="">Not set</option>
                    @foreach (['High Risk', 'Moderate Risk', 'Low Risk'] as $level)
                        <option value="{{ $level }}" @selected($report->priority === $level)>{{ $level }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-blue-950 hover:bg-blue-900 text-white font-bold px-6 py-2.5 rounded-lg transition text-sm">
                    Save Priority
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>