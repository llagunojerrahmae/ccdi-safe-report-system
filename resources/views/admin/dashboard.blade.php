<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex min-h-screen font-sans antialiased">

@php
    $pendingFaculty = \App\Models\User::where('role', 'faculty')->where('status', 'pending')->count();
    $total = max((int) $stats['total'], 0);
    $pct = fn ($n) => $total > 0 ? round(($n / $total) * 100) : 0;
@endphp

<!-- Sidebar -->
<aside class="w-64 bg-gradient-to-b from-blue-950 to-blue-900 text-blue-100 flex flex-col shrink-0 sticky top-0 h-screen border-r-4 border-red-600">
    <div class="flex items-center gap-3 px-6 py-6 border-b border-blue-800">
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-11 h-11 rounded-full object-cover border-2 border-red-600 shadow-md shrink-0">
        <div>
            <h1 class="text-white font-extrabold text-sm tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
            <p class="text-blue-300 text-[10px] uppercase tracking-widest mt-0.5">Admin Panel</p>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <p class="px-4 pb-2 text-[10px] font-bold uppercase tracking-widest text-blue-400">Menu</p>

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white font-semibold border-l-4 border-red-500' : 'hover:bg-white/5 border-l-4 border-transparent' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('admin.faculty') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition {{ request()->routeIs('admin.faculty*') ? 'bg-white/10 text-white font-semibold border-l-4 border-red-500' : 'hover:bg-white/5 border-l-4 border-transparent' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
            </svg>
            Faculty Requests
            @if ($pendingFaculty > 0)
                <span class="ml-auto bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $pendingFaculty }}</span>
            @endif
        </a>

        <a href="{{ route('report.create') }}" target="_blank"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/5 border-l-4 border-transparent transition text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"/>
            </svg>
            View Public Form
            <svg class="w-3.5 h-3.5 ml-auto text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
        </a>

        <a href="{{ route('admin.archive') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition {{ request()->routeIs('admin.archive*') ? 'bg-white/10 text-white font-semibold border-l-4 border-red-500' : 'hover:bg-white/5 border-l-4 border-transparent' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
            </svg>
            Archive
        </a>
    </nav>

    <form action="{{ route('admin.logout') }}" method="POST" class="px-4 py-5 border-t border-blue-800">
        @csrf
        <button type="submit" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-600/20 transition text-sm w-full text-red-300 hover:text-red-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
            </svg>
            Logout
        </button>
    </form>
</aside>

<!-- Main -->
<main class="flex-1 min-w-0 p-6 lg:p-10">

    <!-- Page header -->
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-3 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-blue-950">Reports Dashboard<span class="text-red-600">.</span></h2>
            <div class="w-12 h-1 bg-red-600 rounded-full mt-2"></div>
            <p class="text-slate-500 text-sm mt-3">Overview of all submitted incident reports.</p>
        </div>
        <div class="flex items-center gap-2 text-xs font-semibold text-blue-900 bg-white border border-slate-200 rounded-full px-4 py-2 shadow-sm self-start md:self-auto">
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
            {{ now()->format('l, F d, Y') }}
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-green-800 bg-green-50 border border-green-200 border-l-4 border-l-green-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(($stats['new_notes'] ?? 0) > 0)
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-blue-900 bg-blue-50 border border-blue-200 border-l-4 border-l-blue-700 rounded-xl">
            <span class="bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $stats['new_notes'] }}</span>
            New faculty {{ \Illuminate\Support\Str::plural('note', $stats['new_notes']) }} you haven't read yet.
        </div>
    @endif

    <!-- Stat cards -->
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 border-t-4 border-t-blue-950 p-5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-slate-400 text-xs uppercase font-semibold tracking-wide">Total Reports</p>
                    <p class="text-4xl font-extrabold text-blue-950 mt-2">{{ $stats['total'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                </div>
            </div>
            <p class="text-xs text-slate-400 mt-3">All submitted reports</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 border-t-4 border-t-yellow-500 p-5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-slate-400 text-xs uppercase font-semibold tracking-wide">Pending</p>
                    <p class="text-4xl font-extrabold text-yellow-600 mt-2">{{ $stats['pending'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-full bg-yellow-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-yellow-500 rounded-full" style="width: {{ $pct($stats['pending']) }}%"></div></div>
            <p class="text-xs text-slate-400 mt-1.5">{{ $pct($stats['pending']) }}% of all reports</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 border-t-4 border-t-blue-600 p-5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-slate-400 text-xs uppercase font-semibold tracking-wide">Reviewing</p>
                    <p class="text-4xl font-extrabold text-blue-600 mt-2">{{ $stats['reviewing'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-blue-600 rounded-full" style="width: {{ $pct($stats['reviewing']) }}%"></div></div>
            <p class="text-xs text-slate-400 mt-1.5">{{ $pct($stats['reviewing']) }}% of all reports</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 border-t-4 border-t-green-600 p-5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-slate-400 text-xs uppercase font-semibold tracking-wide">Resolved</p>
                    <p class="text-4xl font-extrabold text-green-600 mt-2">{{ $stats['resolved'] }}</p>
                </div>
                <div class="w-11 h-11 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 h-1.5 rounded-full bg-slate-100 overflow-hidden"><div class="h-full bg-green-600 rounded-full" style="width: {{ $pct($stats['resolved']) }}%"></div></div>
            <p class="text-xs text-slate-400 mt-1.5">{{ $pct($stats['resolved']) }}% of all reports</p>
        </div>
    </div>

    <!-- Filters + search -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-4">
        @php
            $tabBase = 'inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold transition';
            $tabOn   = 'bg-blue-950 text-white shadow-md shadow-blue-950/20';
            $tabOff  = 'bg-white text-slate-600 border border-slate-200 hover:border-blue-900 hover:text-blue-900';
        @endphp
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.dashboard') }}" class="{{ $tabBase }} {{ !request('status') ? $tabOn : $tabOff }}">
                All <span class="text-[10px] px-1.5 py-0.5 rounded-full {{ !request('status') ? 'bg-white/20' : 'bg-slate-100 text-slate-500' }}">{{ $stats['total'] }}</span>
            </a>
            <a href="{{ route('admin.dashboard', ['status' => 'pending']) }}" class="{{ $tabBase }} {{ request('status') === 'pending' ? $tabOn : $tabOff }}">
                Pending <span class="text-[10px] px-1.5 py-0.5 rounded-full {{ request('status') === 'pending' ? 'bg-white/20' : 'bg-yellow-100 text-yellow-700' }}">{{ $stats['pending'] }}</span>
            </a>
            <a href="{{ route('admin.dashboard', ['status' => 'reviewing']) }}" class="{{ $tabBase }} {{ request('status') === 'reviewing' ? $tabOn : $tabOff }}">
                Reviewing <span class="text-[10px] px-1.5 py-0.5 rounded-full {{ request('status') === 'reviewing' ? 'bg-white/20' : 'bg-blue-100 text-blue-700' }}">{{ $stats['reviewing'] }}</span>
            </a>
            <a href="{{ route('admin.dashboard', ['status' => 'resolved']) }}" class="{{ $tabBase }} {{ request('status') === 'resolved' ? $tabOn : $tabOff }}">
                Resolved <span class="text-[10px] px-1.5 py-0.5 rounded-full {{ request('status') === 'resolved' ? 'bg-white/20' : 'bg-green-100 text-green-700' }}">{{ $stats['resolved'] }}</span>
            </a>
            <a href="{{ route('admin.dashboard', ['status' => 'dismissed']) }}" class="{{ $tabBase }} {{ request('status') === 'dismissed' ? $tabOn : $tabOff }}">Dismissed</a>
        </div>

        <div class="relative w-full lg:w-72">
            <svg class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            <input id="report-search" type="text" placeholder="Search on this page..."
                   class="w-full rounded-full border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:ring-4 focus:ring-blue-700/15">
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-blue-950 text-blue-100 text-[11px] uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4 font-semibold">Tracking Code</th>
                        <th class="text-left px-6 py-4 font-semibold">Type</th>
                        <th class="text-left px-6 py-4 font-semibold">Location</th>
                        <th class="text-left px-6 py-4 font-semibold">Date</th>
                        <th class="text-left px-6 py-4 font-semibold">Status</th>
                        <th class="text-left px-6 py-4 font-semibold">Priority</th>
                        <th class="text-left px-6 py-4 font-semibold">Notes</th>
                        <th class="text-right px-6 py-4 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody id="report-body" class="divide-y divide-slate-100">
                    @forelse ($reports as $report)
                        @php
                            $statusColors = [
                                'pending'   => ['bg-yellow-50 text-yellow-700 ring-yellow-200', 'bg-yellow-500'],
                                'reviewing' => ['bg-blue-50 text-blue-700 ring-blue-200', 'bg-blue-600'],
                                'resolved'  => ['bg-green-50 text-green-700 ring-green-200', 'bg-green-600'],
                                'dismissed' => ['bg-slate-100 text-slate-600 ring-slate-300', 'bg-slate-400'],
                            ];
                            $priorityColors = [
                                'high'     => ['bg-red-50 text-red-700 ring-red-200', 'bg-red-600'],
                                'moderate' => ['bg-orange-50 text-orange-700 ring-orange-200', 'bg-orange-500'],
                                'low'      => ['bg-green-50 text-green-700 ring-green-200', 'bg-green-600'],
                            ];
                            $priorityLabels = [
                                'high'     => 'High Risk',
                                'moderate' => 'Moderate Risk',
                                'low'      => 'Low Risk',
                            ];
                            $sc = $statusColors[$report->status] ?? ['bg-slate-50 text-slate-500 ring-slate-200', 'bg-slate-400'];
                            $pc = $priorityColors[$report->priority] ?? ['bg-slate-50 text-slate-500 ring-slate-200', 'bg-slate-400'];
                        @endphp
                        <tr class="report-row hover:bg-blue-50/50 transition">
                            <td class="px-6 py-4 font-bold text-blue-900 whitespace-nowrap">{{ $report->tracking_code }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $report->incident_label }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $report->location }}</td>
                            <td class="px-6 py-4 text-slate-500 whitespace-nowrap">{{ $report->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1 rounded-full uppercase ring-1 ring-inset {{ $sc[0] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $sc[1] }}"></span>
                                    {{ $report->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1 rounded-full ring-1 ring-inset whitespace-nowrap {{ $pc[0] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $pc[1] }}"></span>
                                    {{ $priorityLabels[$report->priority] ?? 'Not set' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @include('partials.notes-badge')
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.reports.show', $report) }}"
                                   class="inline-flex items-center gap-1 text-xs font-bold text-blue-900 bg-blue-50 hover:bg-blue-950 hover:text-white px-3.5 py-1.5 rounded-lg transition">
                                    View
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-14 text-center">
                                <div class="w-12 h-12 mx-auto rounded-full bg-slate-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/></svg>
                                </div>
                                <p class="text-slate-500 font-semibold mt-3">No reports found.</p>
                            </td>
                        </tr>
                    @endforelse
                    <tr id="no-match" class="hidden">
                        <td colspan="8" class="px-6 py-10 text-center text-slate-400">No matching reports on this page.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $reports->links() }}
    </div>
</main>

<script>
    // Filters only the rows already shown on the current page
    const searchBox = document.getElementById('report-search');
    const rows = document.querySelectorAll('.report-row');
    const noMatch = document.getElementById('no-match');

    searchBox.addEventListener('input', () => {
        const q = searchBox.value.trim().toLowerCase();
        let visible = 0;
        rows.forEach(row => {
            const show = row.textContent.toLowerCase().includes(q);
            row.classList.toggle('hidden', !show);
            if (show) visible++;
        });
        noMatch.classList.toggle('hidden', visible > 0 || rows.length === 0);
    });
</script>

</body>
</html>