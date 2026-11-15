<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details - {{ $report->tracking_code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-100 p-8">

        {{-- Header --}}
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Dashboard</a>
            <h1 class="text-2xl font-bold mt-2">Report Details</h1>
            <p class="text-sm text-slate-500">Tracking Code: <span class="font-mono font-bold">{{ $report->tracking_code }}</span></p>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-800 bg-green-50 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 text-sm text-red-800 bg-red-50 rounded-lg">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Actions: Status + Priority --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 p-4 bg-slate-50 rounded-xl border border-slate-100">

            {{-- Update Status --}}
            <form action="{{ route('admin.reports.update', $report) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="block text-xs uppercase text-slate-400 font-semibold mb-1">Status</label>
                <div class="flex gap-2">
                    <select name="status" class="flex-1 border rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewing" {{ $report->status == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                        <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="dismissed" {{ $report->status == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                    </select>
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-800">Update</button>
                </div>
            </form>

            {{-- Set Priority --}}
            <form action="{{ route('admin.reports.priority', $report) }}" method="POST">
                @csrf
                @method('PATCH')
                <label class="block text-xs uppercase text-slate-400 font-semibold mb-1">Priority</label>
                <div class="flex gap-2">
                    <select name="priority" required class="flex-1 border rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ !$report->priority ? 'selected' : '' }}>Set Priority</option>
                        <option value="high" {{ $report->priority == 'high' ? 'selected' : '' }}>High Risk</option>
                        <option value="moderate" {{ $report->priority == 'moderate' ? 'selected' : '' }}>Moderate Risk</option>
                        <option value="low" {{ $report->priority == 'low' ? 'selected' : '' }}>Low Risk</option>
                    </select>
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-800">Save</button>
                </div>
            </form>
        </div>

        {{-- Details --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-t pt-6">
            <div>
                <h3 class="text-xs uppercase text-slate-400 font-semibold mb-1">Incident Type</h3>
                <p class="font-medium text-slate-900">{{ $report->incident_label }}</p>
            </div>
            <div>
                <h3 class="text-xs uppercase text-slate-400 font-semibold mb-1">Location</h3>
                <p class="font-medium text-slate-900">{{ $report->location }}</p>
            </div>
            <div>
                <h3 class="text-xs uppercase text-slate-400 font-semibold mb-1">Priority</h3>
                @if($report->priority === 'high')
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">High Risk</span>
                @elseif($report->priority === 'moderate')
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">Moderate Risk</span>
                @elseif($report->priority === 'low')
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">Low Risk</span>
                @else
                    <p class="text-sm text-slate-400">Not set</p>
                @endif
            </div>

            <div class="md:col-span-3">
                <h3 class="text-xs uppercase text-slate-400 font-semibold mb-1">Description</h3>
                <p class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-slate-700 whitespace-pre-line">{{ $report->description }}</p>
            </div>

            <div class="md:col-span-3">
                <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2">Evidence Attached</h3>
                @if(!empty($report->evidence_paths))
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($report->evidence_paths as $path)
                            <a href="{{ asset('storage/' . $path) }}" target="_blank" class="block border rounded-lg overflow-hidden hover:opacity-80">
                                <img src="{{ asset('storage/' . $path) }}" alt="Evidence" class="w-full h-32 object-cover">
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-400">No evidence attached.</p>
                @endif
            </div>
        </div>

        {{-- Move to Archive (lalabas lang kapag Resolved o Dismissed) --}}
        @if(in_array($report->status, ['resolved', 'dismissed']))
            <div class="border-t mt-8 pt-6 flex items-center justify-between gap-4">
                <p class="text-sm text-slate-500">This report is already {{ $report->status }}. You can move it to the Archive.</p>
                <form action="{{ route('admin.reports.destroy', $report) }}" method="POST"
                      onsubmit="return confirm('Move this report to Archive? You can restore it later.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-700 whitespace-nowrap">
                        Move to Archive
                    </button>
                </form>
            </div>
        @endif

    </div>
</body>
</html>