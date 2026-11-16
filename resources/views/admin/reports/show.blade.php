<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details - {{ $report->tracking_code }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex min-h-screen font-sans antialiased">

@php
    $pendingFaculty = \App\Models\User::where('role', 'faculty')->where('status', 'pending')->count();

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
    $priorityLabels = ['high' => 'High Risk', 'moderate' => 'Moderate Risk', 'low' => 'Low Risk'];
    $sc = $statusColors[$report->status] ?? ['bg-slate-50 text-slate-500 ring-slate-200', 'bg-slate-400'];
    $pc = $priorityColors[$report->priority] ?? ['bg-slate-50 text-slate-500 ring-slate-200', 'bg-slate-400'];
    $evidence = collect($report->evidence_paths ?? []);
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
           class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.reports.*') ? 'bg-white/10 text-white font-semibold border-l-4 border-red-500' : 'hover:bg-white/5 border-l-4 border-transparent' }}">
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

    <!-- Top bar -->
    <div class="flex flex-wrap items-center justify-between gap-3">
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-blue-900 bg-white border border-slate-200 hover:bg-blue-950 hover:text-white hover:border-blue-950 px-4 py-2 rounded-full shadow-sm transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            Back to Dashboard
        </a>

        <div class="flex flex-wrap items-center gap-2">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1.5 rounded-full uppercase ring-1 ring-inset {{ $sc[0] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $sc[1] }}"></span>{{ $report->status }}
            </span>
            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1.5 rounded-full ring-1 ring-inset {{ $pc[0] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $pc[1] }}"></span>{{ $priorityLabels[$report->priority] ?? 'Priority not set' }}
            </span>
        </div>
    </div>

    <!-- Hero -->
    <section class="mt-6 relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 text-white shadow-lg">
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-red-600/20 blur-2xl"></div>
        <div class="absolute -left-10 -bottom-20 w-56 h-56 rounded-full bg-blue-400/10 blur-2xl"></div>

        <div class="relative p-7 lg:p-9">
            <p class="text-[11px] uppercase tracking-widest text-blue-300 font-semibold">Incident Report</p>
            <div class="mt-2 flex flex-wrap items-center gap-3">
                <h2 class="text-3xl font-extrabold tracking-tight">{{ $report->incident_label }}<span class="text-red-500">.</span></h2>
                <button type="button" id="copy-code" title="Copy tracking code"
                        class="inline-flex items-center gap-2 font-mono text-sm font-bold bg-white/10 hover:bg-white/20 border border-white/20 px-3 py-1.5 rounded-lg transition">
                    {{ $report->tracking_code }}
                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"/></svg>
                </button>
            </div>

            @php $heroNew = $report->notes->whereNull('seen_by_admin_at')->count(); @endphp
            @if ($heroNew > 0)
                <a href="#faculty-notes" class="mt-5 inline-flex items-center gap-2.5 rounded-full bg-red-600 hover:bg-red-500 px-4 py-2 text-sm font-bold shadow-lg shadow-red-900/30 transition">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white opacity-75"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-white"></span>
                    </span>
                    {{ $heroNew }} new {{ \Illuminate\Support\Str::plural('note', $heroNew) }} from faculty
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/></svg>
                </a>
            @endif

            <div class="mt-7 grid sm:grid-cols-3 gap-4">
                <div class="flex items-center gap-3 rounded-2xl bg-white/10 border border-white/10 px-4 py-3.5">
                    <span class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-red-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-wider text-blue-300 font-semibold">Incident Type</p>
                        <p class="font-bold truncate">{{ $report->incident_label }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-2xl bg-white/10 border border-white/10 px-4 py-3.5">
                    <span class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-red-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-wider text-blue-300 font-semibold">Location</p>
                        <p class="font-bold truncate">{{ $report->location }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-2xl bg-white/10 border border-white/10 px-4 py-3.5">
                    <span class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-red-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <div class="min-w-0">
                        <p class="text-[10px] uppercase tracking-wider text-blue-300 font-semibold">Submitted</p>
                        <p class="font-bold">{{ $report->created_at->format('M d, Y') }}
                            <span class="font-normal text-blue-200 text-xs">· {{ $report->created_at->format('h:i A') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="mt-6 flex items-center gap-3 p-4 text-sm text-green-800 bg-green-50 border border-green-200 border-l-4 border-l-green-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mt-6 flex items-center gap-3 p-4 text-sm text-red-800 bg-red-50 border border-red-200 border-l-4 border-l-red-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="mt-6 grid xl:grid-cols-3 gap-6 items-start">

        <!-- Left -->
        <div class="xl:col-span-2 space-y-6">

            <!-- Description -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-7">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-5 rounded-full bg-red-600"></span>
                    <h3 class="text-blue-950 font-extrabold text-lg">What happened</h3>
                </div>
                <p class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $report->description }}</p>
            </div>

            <!-- Evidence -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-7">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-5 rounded-full bg-red-600"></span>
                        <h3 class="text-blue-950 font-extrabold text-lg">Evidence</h3>
                    </div>
                    @if($evidence->isNotEmpty())
                        <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-blue-100 text-blue-800">{{ $evidence->count() }} file{{ $evidence->count() > 1 ? 's' : '' }}</span>
                    @endif
                </div>

                @if($evidence->isNotEmpty())
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($evidence as $path)
                            @php
                                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                $isVideo = in_array($ext, ['mp4', 'mov', 'webm', 'avi', 'mkv', 'm4v']);
                                $url = asset('storage/' . $path);
                            @endphp
                            <a href="{{ $url }}" target="_blank"
                               data-evidence data-src="{{ $url }}" data-type="{{ $isVideo ? 'video' : 'image' }}" data-name="{{ basename($path) }}"
                               class="group relative block aspect-[4/3] rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-sm hover:shadow-lg hover:border-blue-700 transition">
                                @if($isVideo)
                                    <video src="{{ $url }}#t=0.5" preload="metadata" muted class="w-full h-full object-cover pointer-events-none"></video>
                                    <span class="absolute inset-0 flex items-center justify-center">
                                        <span class="w-12 h-12 rounded-full bg-blue-950/80 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </span>
                                    </span>
                                @else
                                    <img src="{{ $url }}" alt="Evidence" class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                                @endif
                                <span class="absolute inset-0 bg-blue-950/0 group-hover:bg-blue-950/40 transition flex items-center justify-center">
                                    <span class="opacity-0 group-hover:opacity-100 transition inline-flex items-center gap-1.5 bg-white text-blue-950 text-xs font-bold px-3 py-1.5 rounded-full shadow">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/></svg>
                                        View
                                    </span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 bg-slate-50 border border-dashed border-slate-200 rounded-xl">
                        <p class="text-sm text-slate-400">No evidence attached.</p>
                    </div>
                @endif
            </div>

        </div>

        <!-- Right: manage -->
        <div class="space-y-6 xl:sticky xl:top-6">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-7 py-5 bg-slate-50 border-b border-slate-100">
                    <h3 class="text-blue-950 font-extrabold text-lg">Manage Report</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Update the status and risk level.</p>
                </div>

                <div class="p-7 space-y-7">
                    {{-- Status --}}
                    <form action="{{ route('admin.reports.update', $report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-3">Status</p>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach (['pending' => 'Pending', 'reviewing' => 'Reviewing', 'resolved' => 'Resolved', 'dismissed' => 'Dismissed'] as $val => $label)
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="{{ $val }}" class="peer sr-only" {{ $report->status === $val ? 'checked' : '' }}>
                                    <span class="block text-center rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-xs font-bold text-slate-600 transition hover:border-blue-700 hover:text-blue-900 peer-checked:border-blue-950 peer-checked:bg-blue-950 peer-checked:text-white peer-focus-visible:ring-4 peer-focus-visible:ring-blue-700/20">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-3 w-full bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition">Update Status</button>
                    </form>

                    {{-- Priority --}}
                    <form action="{{ route('admin.reports.priority', $report) }}" method="POST" class="pt-7 border-t border-slate-100">
                        @csrf
                        @method('PATCH')
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-3">Priority</p>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach ([
                                'high'     => ['High', 'peer-checked:bg-red-600 peer-checked:border-red-600'],
                                'moderate' => ['Moderate', 'peer-checked:bg-orange-500 peer-checked:border-orange-500'],
                                'low'      => ['Low', 'peer-checked:bg-green-600 peer-checked:border-green-600'],
                            ] as $val => [$label, $checked])
                                <label class="cursor-pointer">
                                    <input type="radio" name="priority" value="{{ $val }}" required class="peer sr-only" {{ $report->priority === $val ? 'checked' : '' }}>
                                    <span class="block text-center rounded-xl border border-slate-200 bg-slate-50 px-2 py-2.5 text-xs font-bold text-slate-600 transition hover:border-blue-700 peer-checked:text-white {{ $checked }}">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-3 w-full bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition">Save Priority</button>
                    </form>
                </div>
            </div>

            {{-- Move to Archive (lalabas lang kapag Resolved o Dismissed) --}}
            @if(in_array($report->status, ['resolved', 'dismissed']))
                <div class="bg-red-50 border border-red-200 border-l-4 border-l-red-600 rounded-2xl p-6">
                    <h3 class="text-red-700 font-bold">Move to Archive</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">This report is already {{ $report->status }}. You can move it to the Archive and restore it later.</p>
                    <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" class="mt-4"
                          onsubmit="return confirm('Move this report to Archive? You can restore it later.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition">
                            Move to Archive
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    {{-- Faculty notes --}}
    @include('partials.faculty-notes')
</main>

<!-- Evidence viewer -->
<div id="viewer" class="hidden fixed inset-0 z-[100] flex-col bg-blue-950/95 backdrop-blur-sm">
    <div class="flex items-center justify-between gap-4 px-5 py-4 border-b border-white/10">
        <button id="viewer-back" type="button"
                class="inline-flex items-center gap-2 text-sm font-semibold text-white bg-white/10 hover:bg-white hover:text-blue-950 border border-white/20 px-4 py-2 rounded-full transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            Back
        </button>
        <div class="min-w-0 text-center">
            <p id="viewer-name" class="text-white text-sm font-semibold truncate"></p>
            <p id="viewer-count" class="text-blue-300 text-xs"></p>
        </div>
        <a id="viewer-open" href="#" target="_blank" class="text-xs font-semibold text-blue-200 hover:text-white transition whitespace-nowrap">Open original</a>
    </div>

    <div id="viewer-area" class="relative flex-1 min-h-0 flex items-center justify-center p-4 sm:p-8">
        <button id="viewer-prev" type="button" aria-label="Previous"
                class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-white text-white hover:text-blue-950 border border-white/20 flex items-center justify-center transition z-10">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
        </button>
        <div id="viewer-stage" class="max-h-full max-w-full flex items-center justify-center"></div>
        <button id="viewer-next" type="button" aria-label="Next"
                class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/10 hover:bg-white text-white hover:text-blue-950 border border-white/20 flex items-center justify-center transition z-10">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </button>
    </div>
</div>


<script>
    const items = Array.from(document.querySelectorAll('[data-evidence]'));
    const viewer = document.getElementById('viewer');
    const stage = document.getElementById('viewer-stage');
    const area = document.getElementById('viewer-area');
    const nameEl = document.getElementById('viewer-name');
    const countEl = document.getElementById('viewer-count');
    const openEl = document.getElementById('viewer-open');
    const prevBtn = document.getElementById('viewer-prev');
    const nextBtn = document.getElementById('viewer-next');
    let index = 0;

    function show(i) {
        index = (i + items.length) % items.length;
        const el = items[index];
        const node = document.createElement(el.dataset.type === 'video' ? 'video' : 'img');
        if (el.dataset.type === 'video') { node.controls = true; node.autoplay = true; } else { node.alt = 'Evidence'; }
        node.src = el.dataset.src;
        node.className = 'max-h-[78vh] max-w-full rounded-xl shadow-2xl object-contain';
        stage.innerHTML = '';
        stage.appendChild(node);
        nameEl.textContent = el.dataset.name;
        countEl.textContent = (index + 1) + ' / ' + items.length;
        openEl.href = el.dataset.src;
        const multi = items.length > 1;
        prevBtn.classList.toggle('hidden', !multi);
        nextBtn.classList.toggle('hidden', !multi);
    }

    function openViewer(i) {
        show(i);
        viewer.classList.remove('hidden');
        viewer.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeViewer() {
        stage.innerHTML = '';
        viewer.classList.add('hidden');
        viewer.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    items.forEach((el, i) => el.addEventListener('click', e => { e.preventDefault(); openViewer(i); }));
    document.getElementById('viewer-back').addEventListener('click', closeViewer);
    prevBtn.addEventListener('click', () => show(index - 1));
    nextBtn.addEventListener('click', () => show(index + 1));
    area.addEventListener('click', e => { if (e.target === area || e.target === stage) closeViewer(); });
    document.addEventListener('keydown', e => {
        if (viewer.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeViewer();
        if (e.key === 'ArrowLeft' && items.length > 1) show(index - 1);
        if (e.key === 'ArrowRight' && items.length > 1) show(index + 1);
    });

    // Copy tracking code
    const copyBtn = document.getElementById('copy-code');
    copyBtn.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(@json($report->tracking_code));
            const old = copyBtn.firstChild.textContent;
            copyBtn.firstChild.textContent = 'Copied! ';
            setTimeout(() => copyBtn.firstChild.textContent = old, 1200);
        } catch (e) {}
    });
</script>

</body>
</html>