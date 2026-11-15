<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex min-h-screen">

<aside class="w-64 bg-blue-950 text-blue-100 flex flex-col shrink-0">
    <div class="flex items-center gap-3 px-6 py-6 border-b border-blue-900">
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-10 h-10 rounded-full object-cover border-2 border-red-600 shadow-sm shrink-0">
        <div>
            <h1 class="text-white font-extrabold text-sm tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
            <p class="text-blue-300 text-[10px]">Admin Panel</p>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm">Dashboard</a>
        <a href="{{ route('report.create') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm">View Public Form</a>
        <a href="{{ route('admin.archive') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-blue-900 text-white font-medium text-sm">Archive</a>
    </nav>

    <form action="{{ route('admin.logout') }}" method="POST" class="px-4 py-6 border-t border-blue-900">
        @csrf
        <button type="submit" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm w-full text-red-300">Logout</button>
    </form>
</aside>

<main class="flex-1 p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-blue-950">Archive</h2>
        <p class="text-slate-500 text-sm mt-1">Reports that were moved out of the dashboard. You can restore them anytime.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 text-sm text-green-800 bg-green-50 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-6 py-3">Tracking Code</th>
                    <th class="text-left px-6 py-3">Type</th>
                    <th class="text-left px-6 py-3">Location</th>
                    <th class="text-left px-6 py-3">Description</th>
                    <th class="text-left px-6 py-3">Archived On</th>
                    <th class="text-right px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($reports as $report)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-semibold text-blue-900">{{ $report->tracking_code }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $report->incident_label }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $report->location }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ \Illuminate\Support\Str::limit($report->description, 50) }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $report->deleted_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.reports.restore', $report->id) }}" method="POST"
                                  onsubmit="return confirm('Restore this report to the dashboard?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-blue-700 hover:underline font-semibold">Restore</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-400">No archived reports.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $reports->links() }}
    </div>
</main>

</body>
</html>