<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex min-h-screen">

<aside class="w-64 bg-blue-950 text-blue-100 flex flex-col shrink-0">
    <div class="flex items-center gap-3 px-6 py-6 border-b border-blue-900">
        <!-- Dashboard Image Logo -->
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-10 h-10 rounded-full object-cover border-2 border-red-600 shadow-sm shrink-0">
        <div>
            <h1 class="text-white font-extrabold text-sm tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
            <p class="text-blue-300 text-[10px]">Admin Panel</p>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-blue-900 text-white font-medium text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
            </svg>
            Dashboard
        </a>
        <a href="{{ route('report.create') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"/>
            </svg>
            View Public Form
        </a>
        <a href="{{ route('admin.archive') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
            </svg>
            Archive
        </a>
    </nav>

    <form action="{{ route('admin.logout') }}" method="POST" class="px-4 py-6 border-t border-blue-900">
        @csrf
        <button type="submit" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-blue-900 transition text-sm w-full text-red-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
            </svg>
            Logout
        </button>
    </form>
</aside>

<main class="flex-1 p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-blue-950">Reports Dashboard</h2>
        <p class="text-slate-500 text-sm mt-1">Overview of all submitted incident reports.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
            <p class="text-slate-400 text-xs uppercase font-semibold mb-1">Total Reports</p>
            <p class="text-3xl font-extrabold text-blue-950">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
            <p class="text-slate-400 text-xs uppercase font-semibold mb-1">Pending</p>
            <p class="text-3xl font-extrabold text-yellow-600">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
            <p class="text-slate-400 text-xs uppercase font-semibold mb-1">Reviewing</p>
            <p class="text-3xl font-extrabold text-blue-600">{{ $stats['reviewing'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
            <p class="text-slate-400 text-xs uppercase font-semibold mb-1">Resolved</p>
            <p class="text-3xl font-extrabold text-green-600">{{ $stats['resolved'] }}</p>
        </div>
    </div>

    <div class="flex gap-2 mb-4">
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-1.5 rounded-full text-xs font-semibold {{ !request('status') ? 'bg-blue-950 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">All</a>
        <a href="{{ route('admin.dashboard', ['status' => 'pending']) }}" class="px-4 py-1.5 rounded-full text-xs font-semibold {{ request('status') === 'pending' ? 'bg-blue-950 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">Pending</a>
        <a href="{{ route('admin.dashboard', ['status' => 'reviewing']) }}" class="px-4 py-1.5 rounded-full text-xs font-semibold {{ request('status') === 'reviewing' ? 'bg-blue-950 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">Reviewing</a>
        <a href="{{ route('admin.dashboard', ['status' => 'resolved']) }}" class="px-4 py-1.5 rounded-full text-xs font-semibold {{ request('status') === 'resolved' ? 'bg-blue-950 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">Resolved</a>
        <a href="{{ route('admin.dashboard', ['status' => 'dismissed']) }}" class="px-4 py-1.5 rounded-full text-xs font-semibold {{ request('status') === 'dismissed' ? 'bg-blue-950 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">Dismissed</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-6 py-3">Tracking Code</th>
                    <th class="text-left px-6 py-3">Type</th>
                    <th class="text-left px-6 py-3">Location</th>
                    <th class="text-left px-6 py-3">Date</th>
                    <th class="text-left px-6 py-3">Status</th>
                    <th class="text-left px-6 py-3">Priority</th>
                    <th class="text-right px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($reports as $report)
                    @php
                        $statusColors = [
                            'pending'   => 'bg-yellow-100 text-yellow-700',
                            'reviewing' => 'bg-blue-100 text-blue-700',
                            'resolved'  => 'bg-green-100 text-green-700',
                            'dismissed' => 'bg-slate-200 text-slate-600',
                        ];
                        $priorityColors = [
                            'high'     => 'bg-red-100 text-red-700',
                            'moderate' => 'bg-orange-100 text-orange-700',
                            'low'      => 'bg-green-100 text-green-700',
                        ];
                        $priorityLabels = [
                            'high'     => 'High Risk',
                            'moderate' => 'Moderate Risk',
                            'low'      => 'Low Risk',
                        ];
                    @endphp
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-semibold text-blue-900">{{ $report->tracking_code }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $report->incident_label }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $report->location }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $report->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-bold px-3 py-1 rounded-full uppercase {{ $statusColors[$report->status] ?? 'bg-slate-100 text-slate-500' }}">
                                {{ $report->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-bold px-3 py-1 rounded-full {{ $priorityColors[$report->priority] ?? 'bg-slate-100 text-slate-500' }}">
                                {{ $priorityLabels[$report->priority] ?? 'Not set' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.reports.show', $report) }}" class="text-blue-700 hover:underline font-semibold">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-slate-400">No reports found.</td>
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