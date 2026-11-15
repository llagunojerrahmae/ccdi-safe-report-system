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

    <!-- Back + title -->
    <a href="{{ route('admin.dashboard') }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-blue-900 bg-white border border-slate-200 hover:bg-blue-950 hover:text-white hover:border-blue-950 px-4 py-2 rounded-full shadow-sm transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
        Back to Dashboard
    </a>

    <div class="mt-6 mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-blue-950">Report Details<span class="text-red-600">.</span></h2>
            <div class="w-12 h-1 bg-red-600 rounded-full mt-2"></div>
            <p class="text-slate-500 text-sm mt-3">
                Tracking Code:
                <span class="font-mono font-bold text-blue-900 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-md">{{ $report->tracking_code }}</span>
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1.5 rounded-full uppercase ring-1 ring-inset {{ $sc[0] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $sc[1] }}"></span>{{ $report->status }}
            </span>
            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1.5 rounded-full ring-1 ring-inset {{ $pc[0] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $pc[1] }}"></span>{{ $priorityLabels[$report->priority] ?? 'Priority not set' }}
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-green-800 bg-green-50 border border-green-200 border-l-4 border-l-green-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-red-800 bg-red-50 border border-red-200 border-l-4 border-l-red-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="grid xl:grid-cols-3 gap-6 items-start">

        <!-- Left: details -->
        <div class="xl:col-span-2 space-y-6">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 border-t-4 border-t-blue-950 p-7">
                <div class="grid sm:grid-cols-3 gap-6">
                    <div>
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-1.5">Incident Type</p>
                        <p class="font-bold text-blue-950">{{ $report->incident_label }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-1.5">Location</p>
                        <p class="font-bold text-blue-950">{{ $report->location }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-1.5">Submitted</p>
                        <p class="font-bold text-blue-950">{{ $report->created_at->format('M d, Y') }}</p>
                        <p class="text-xs text-slate-400">{{ $report->created_at->format('h:i A') }}</p>
                    </div>
                </div>

                <div class="mt-7 pt-6 border-t border-slate-100">
                    <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide mb-2">Description</p>
                    <p class="bg-slate-50 border border-slate-100 border-l-4 border-l-red-600 rounded-xl p-5 text-slate-700 text-sm leading-relaxed whitespace-pre-line">{{ $report->description }}</p>
                </div>
            </div>

            <!-- Evidence -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-7">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-blue-950 font-extrabold text-lg">Evidence Attached</h3>
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
        <div class="space-y-6">

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-7">
                <h3 class="text-blue-950 font-extrabold text-lg mb-5">Manage Report</h3>

                {{-- Update Status --}}
                <form action="{{ route('admin.reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="block text-xs uppercase text-slate-400 font-semibold tracking-wide mb-2">Status</label>
                    <div class="flex gap-2">
                        <select name="status" class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">
                            <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewing" {{ $report->status == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                            <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="dismissed" {{ $report->status == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                        </select>
                        <button type="submit" class="bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition">Update</button>
                    </div>
                </form>

                {{-- Set Priority --}}
                <form action="{{ route('admin.reports.priority', $report) }}" method="POST" class="mt-6 pt-6 border-t border-slate-100">
                    @csrf
                    @method('PATCH')
                    <label class="block text-xs uppercase text-slate-400 font-semibold tracking-wide mb-2">Priority</label>
                    <div class="flex gap-2">
                        <select name="priority" required class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm outline-none transition focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">
                            <option value="" disabled {{ !$report->priority ? 'selected' : '' }}>Set Priority</option>
                            <option value="high" {{ $report->priority == 'high' ? 'selected' : '' }}>High Risk</option>
                            <option value="moderate" {{ $report->priority == 'moderate' ? 'selected' : '' }}>Moderate Risk</option>
                            <option value="low" {{ $report->priority == 'low' ? 'selected' : '' }}>Low Risk</option>
                        </select>
                        <button type="submit" class="bg-blue-950 hover:bg-blue-900 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition">Save</button>
                    </div>
                </form>
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
</script>

</body>
</html>