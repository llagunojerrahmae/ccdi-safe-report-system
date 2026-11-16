<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        .bell-ring { animation: bell-ring 1s ease-in-out; transform-origin: 50% 0; }
        @keyframes bell-ring {
            0%,100% { transform: rotate(0); }
            15% { transform: rotate(16deg); } 30% { transform: rotate(-14deg); }
            45% { transform: rotate(10deg); } 60% { transform: rotate(-8deg); }
            75% { transform: rotate(4deg); }
        }
        .toast-in { animation: toast-in .35s ease; }
        @keyframes toast-in { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: none; } }
        @media (prefers-reduced-motion: reduce) { .bell-ring, .toast-in { animation: none; } }
    </style>
</head>
<body class="bg-slate-50 text-slate-700">

@php
    $types = $reports->pluck('incident_type')->unique()->values();
@endphp

<!-- Mobile overlay -->
<div id="overlay" class="fixed inset-0 z-40 hidden bg-blue-950/60 md:hidden"></div>

<!-- Sidebar -->
<aside id="sidebar"
       class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r-4 border-red-600 bg-gradient-to-b from-blue-950 to-blue-900 text-blue-100 transition-transform md:translate-x-0">
    <a href="{{ route('home') }}" class="flex items-center gap-3 border-b border-white/10 px-6 py-6">
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="size-14 rounded-full border-2 border-red-600 object-cover">
        <div class="leading-tight">
            <p class="font-extrabold tracking-wide text-white">SAFEREPORT<span class="text-red-500">.</span></p>
            <p class="text-xs uppercase tracking-wider text-blue-200">Faculty Panel</p>
        </div>
    </a>

    <nav class="flex-1 space-y-1 px-4 py-6">
        <p class="mb-3 px-2 text-xs font-bold uppercase tracking-wider text-blue-300">Menu</p>

        <a href="{{ url()->current() }}" class="flex items-center gap-3 rounded-xl border-l-4 border-red-600 bg-white/10 px-4 py-3 font-semibold text-white">
            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
            Dashboard
        </a>
        <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 font-medium transition hover:bg-white/10 hover:text-white">
            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 11l9-8 9 8M5 10v10h14V10"/></svg>
            View Public Site
        </a>
    </nav>

    <div class="border-t border-white/10 p-4">
        <div class="mb-3 flex items-center gap-3 px-2">
            <span class="grid size-10 shrink-0 place-items-center rounded-full bg-white/15 font-bold text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            <div class="min-w-0 leading-tight">
                <p class="truncate text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-blue-300">Faculty</p>
            </div>
        </div>
        <form method="POST" action="{{ route('faculty.logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 font-medium transition hover:bg-white/10 hover:text-white">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- Main -->
<div class="md:pl-72">

    <!-- Top bar -->
    <header class="sticky top-0 z-30 flex items-center justify-between border-b border-slate-200 bg-white/90 px-6 py-3 backdrop-blur md:px-10">
        <button id="menu-btn" type="button" class="rounded-lg p-2 text-blue-950 hover:bg-slate-100 md:hidden" aria-label="Open menu">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <span class="hidden items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-blue-950 shadow-sm md:inline-flex">
            <svg class="size-4 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path stroke-linecap="round" d="M3 10h18M8 3v4M16 3v4"/></svg>
            {{ now()->format('l, F j, Y') }}
        </span>

        <!-- Bell -->
        <div class="relative">
            <button id="bell-btn" type="button" aria-label="Notifications" aria-expanded="false"
                    class="relative grid size-11 place-items-center rounded-full border border-slate-200 bg-white text-blue-950 shadow-sm transition hover:bg-blue-50">
                <svg id="bell-icon" class="size-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 11-6 0"/></svg>
                <span id="bell-badge" class="{{ $newCount > 0 ? '' : 'hidden' }} absolute -right-1 -top-1 grid min-w-5 place-items-center rounded-full bg-red-600 px-1.5 text-[11px] font-bold leading-5 text-white ring-2 ring-white">{{ $newCount }}</span>
            </button>

            <div id="bell-panel" class="absolute right-0 mt-3 hidden w-80 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl shadow-blue-950/15">
                <div class="flex items-center justify-between bg-gradient-to-r from-blue-950 to-blue-900 px-4 py-3 text-white">
                    <p class="font-bold">Notifications</p>
                    <button id="sound-toggle" type="button" class="flex items-center gap-1.5 rounded-full border border-white/40 px-3 py-1 text-xs font-semibold hover:bg-white/10">
                        <span id="sound-dot" class="size-2 rounded-full bg-slate-400"></span>
                        <span id="sound-label">Sound off</span>
                    </button>
                </div>
                <ul class="max-h-80 divide-y divide-slate-100 overflow-y-auto">
                    @forelse ($reports->take(5) as $r)
                        <li class="px-4 py-3">
                            <p class="text-sm font-semibold capitalize text-blue-950">{{ str_replace('_', ' ', $r->incident_type) }}</p>
                            <p class="truncate text-xs text-slate-500">{{ $r->location }}</p>
                            <p class="mt-0.5 text-[11px] text-slate-400">{{ $r->created_at->diffForHumans() }}</p>
                        </li>
                    @empty
                        <li class="px-4 py-8 text-center text-sm text-slate-500">No notifications yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </header>

    <!-- Toast for new report -->
    <div id="toast" class="toast-in fixed right-6 top-20 z-50 hidden max-w-xs rounded-2xl border border-red-200 bg-white p-4 shadow-xl">
        <p class="font-bold text-red-600">New report</p>
        <p class="mt-0.5 text-sm text-slate-600">Something new has been submitted. Refresh to view it.</p>
        <button id="toast-refresh" type="button" class="mt-3 rounded-lg bg-blue-950 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-900">Refresh now</button>
    </div>

    <main id="page-data" data-total="{{ $reports->total() }}" data-new="{{ $newCount }}" class="mx-auto max-w-5xl px-6 py-10 md:px-10">

        <h2 class="text-4xl font-extrabold text-blue-950">Reports Dashboard<span class="text-red-600">.</span></h2>
        <div class="mt-2 h-1 w-12 rounded-full bg-red-600"></div>
        <p class="mt-3 text-slate-500">Anonymous reports from students. View only.</p>

        @if (session('success'))
            <div class="mt-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                <span class="font-bold">✓</span> {{ session('success') }}
            </div>
        @endif

        <!-- Stats -->
        <div class="mt-8 grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-slate-100 border-t-4 border-t-blue-950 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total reports</p>
                <p class="mt-2 text-4xl font-extrabold text-blue-950">{{ $reports->total() }}</p>
                <p class="mt-1 text-sm text-slate-400">All submitted reports</p>
            </div>
            <div class="rounded-2xl border border-slate-100 border-t-4 border-t-red-600 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">New reports</p>
                <p class="mt-2 text-4xl font-extrabold text-red-600">{{ $newCount }}</p>
                <p class="mt-1 text-sm text-slate-400">Waiting to be viewed</p>
            </div>
            <div class="rounded-2xl border border-slate-100 border-t-4 border-t-blue-600 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">On this page</p>
                <p class="mt-2 text-4xl font-extrabold text-blue-700">{{ $reports->count() }}</p>
                <p class="mt-1 text-sm text-slate-400">Reports shown below</p>
            </div>
        </div>

        <!-- Filters + search -->
        <div class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex flex-wrap gap-2" id="type-chips">
                <button type="button" data-type="all" class="chip rounded-full bg-blue-950 px-4 py-2 text-sm font-semibold text-white">All</button>
                @foreach ($types as $t)
                    <button type="button" data-type="{{ $t }}" class="chip rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold capitalize text-slate-600 transition hover:border-blue-300">{{ str_replace('_', ' ', $t) }}</button>
                @endforeach
            </div>

            <div class="relative lg:w-72">
                <svg class="absolute left-4 top-1/2 size-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"/></svg>
                <input type="text" id="reportSearch" placeholder="Search on this page..." autocomplete="off"
                       class="w-full rounded-full border border-slate-200 bg-white py-2.5 pl-12 pr-4 text-sm shadow-sm placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <p id="noResults" class="hidden py-10 text-center text-slate-500">No report found.</p>

        <!-- Reports -->
        <div class="mt-6">
        @forelse ($reports as $report)
            <article class="report-card mb-4 cursor-pointer rounded-2xl border border-slate-100 border-l-4 border-l-blue-950 bg-white p-6 shadow-sm transition hover:border-l-red-600 hover:shadow-md"
                     tabindex="0" role="button"
                     data-type="{{ $report->incident_type }}"
                     data-id="{{ $report->id }}"
                     data-action="{{ route('faculty.reports.notes.store', $report) }}"
                     data-title="{{ str_replace('_', ' ', $report->incident_type) }}"
                     data-location="{{ $report->location }}"
                     data-desc="{{ $report->description }}">
                <div class="flex flex-wrap items-start justify-between gap-2">
                    <h3 class="text-lg font-bold capitalize text-blue-950">{{ str_replace('_', ' ', $report->incident_type) }}</h3>
                    <span class="text-xs text-slate-400">{{ $report->created_at->diffForHumans() }}</span>
                </div>
                @if ($report->location)
                    <p class="mt-0.5 text-sm text-slate-500">📍 {{ $report->location }}</p>
                @endif
                <p class="mt-3 leading-relaxed text-slate-600">{{ $report->description }}</p>

                @if (!empty($report->evidence_paths))
                    <div class="mt-4">
                        <p class="mb-2 text-xs font-semibold uppercase text-slate-400">Evidence</p>
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                            @foreach ($report->evidence_paths as $path)
                                @php
                                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                    $url = asset('storage/' . $path);
                                @endphp

                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <a href="{{ $url }}" target="_blank">
                                        <img src="{{ $url }}" alt="Evidence" class="h-32 w-full rounded-lg border border-slate-200 object-cover transition hover:opacity-90">
                                    </a>
                                @elseif (in_array($ext, ['mp4', 'mov', 'webm']))
                                    <video controls preload="metadata" class="h-32 w-full rounded-lg border border-slate-200 bg-black">
                                        <source src="{{ $url }}">
                                    </video>
                                @else
                                    <a href="{{ $url }}" target="_blank" class="break-all text-sm text-blue-700 hover:underline">{{ basename($path) }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $labels = ['reviewing' => 'Reviewing', 'handling' => 'I will handle this', 'resolved' => 'Resolved'];
                    $colors = [
                        'reviewing' => 'bg-blue-50 text-blue-700 border-blue-200',
                        'handling'  => 'bg-amber-50 text-amber-700 border-amber-200',
                        'resolved'  => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    ];
                    $latest = $report->notes->first();
                @endphp
                <div class="mt-5 flex items-center justify-between gap-3 border-t border-slate-100 pt-4">
                    <div class="flex items-center gap-2 text-xs">
                        @if ($latest)
                            <span class="rounded-full border px-3 py-1 font-semibold {{ $colors[$latest->status] ?? '' }}">{{ $labels[$latest->status] ?? $latest->status }}</span>
                            <span class="text-slate-400">{{ $report->notes->count() }} {{ Str::plural('note', $report->notes->count()) }}</span>
                        @else
                            <span class="text-slate-400">No notes yet</span>
                        @endif
                    </div>
                    <span class="text-sm font-semibold text-blue-700">Open and add note &rarr;</span>
                </div>

                {{-- Notes history, copied into the popup by JS --}}
                <div class="notes-source hidden">
                    @foreach ($report->notes as $n)
                        <div class="note-item rounded-xl border border-slate-200 bg-slate-50 p-3"
                             data-status="{{ $labels[$n->status] ?? $n->status }}"
                             data-color="{{ $colors[$n->status] ?? '' }}"
                             data-who="{{ $n->user->name ?? 'Faculty' }}"
                             data-when="{{ $n->created_at->diffForHumans() }}"
                             data-text="{{ $n->note }}"></div>
                    @endforeach
                </div>
            </article>
        @empty
            <p class="py-10 text-center text-slate-500">No report yet</p>
        @endforelse
        </div>

        <div class="mt-6">{{ $reports->links() }}</div>
    </main>
</div>

<script>
// ---------- Sidebar (mobile) ----------
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
function toggleMenu(open) {
    sidebar.classList.toggle('-translate-x-full', !open);
    overlay.classList.toggle('hidden', !open);
}
document.getElementById('menu-btn').addEventListener('click', () => toggleMenu(true));
overlay.addEventListener('click', () => toggleMenu(false));

// ---------- Search + type filter ----------
const searchInput = document.getElementById('reportSearch');
const noResults = document.getElementById('noResults');
const chips = document.querySelectorAll('.chip');
let activeType = 'all';

function applyFilters() {
    const keyword = searchInput.value.toLowerCase().trim();
    const cards = document.querySelectorAll('.report-card');
    let visible = 0;
    cards.forEach(card => {
        const okType = activeType === 'all' || card.dataset.type === activeType;
        const okText = card.innerText.toLowerCase().includes(keyword);
        const show = okType && okText;
        card.classList.toggle('hidden', !show);
        if (show) visible++;
    });
    noResults.classList.toggle('hidden', visible > 0 || cards.length === 0);
}
searchInput.addEventListener('input', applyFilters);
chips.forEach(chip => chip.addEventListener('click', () => {
    activeType = chip.dataset.type;
    chips.forEach(c => {
        const on = c === chip;
        c.classList.toggle('bg-blue-950', on);
        c.classList.toggle('text-white', on);
        c.classList.toggle('bg-white', !on);
        c.classList.toggle('text-slate-600', !on);
        c.classList.toggle('border', !on);
    });
    applyFilters();
}));

// ---------- Bell, sound, live check ----------
const bellBtn = document.getElementById('bell-btn');
const bellPanel = document.getElementById('bell-panel');
const bellIcon = document.getElementById('bell-icon');
const bellBadge = document.getElementById('bell-badge');
const toast = document.getElementById('toast');
const pageData = document.getElementById('page-data');

let audioCtx = null;
let soundOn = false;
try { soundOn = localStorage.getItem('faculty_sound') === 'on'; } catch (e) {}

function renderSound() {
    document.getElementById('sound-label').textContent = soundOn ? 'Sound on' : 'Sound off';
    document.getElementById('sound-dot').className = 'size-2 rounded-full ' + (soundOn ? 'bg-emerald-400' : 'bg-slate-400');
}
renderSound();

function getCtx() {
    if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    if (audioCtx.state === 'suspended') audioCtx.resume();
    return audioCtx;
}

// Two-tone chime made in the browser, no audio file needed
function playChime() {
    try {
        const ctx = getCtx();
        [[880, 0], [1175, 0.18], [880, 0.5], [1175, 0.68]].forEach(([freq, delay]) => {
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.type = 'sine';
            osc.frequency.value = freq;
            const t = ctx.currentTime + delay;
            gain.gain.setValueAtTime(0.0001, t);
            gain.gain.exponentialRampToValueAtTime(0.3, t + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.0001, t + 0.4);
            osc.connect(gain).connect(ctx.destination);
            osc.start(t);
            osc.stop(t + 0.45);
        });
    } catch (e) {}
}

function ringBell() {
    bellIcon.classList.remove('bell-ring');
    void bellIcon.offsetWidth;
    bellIcon.classList.add('bell-ring');
}

bellBtn.addEventListener('click', e => {
    e.stopPropagation();
    const open = bellPanel.classList.toggle('hidden') === false;
    bellBtn.setAttribute('aria-expanded', open);
});
bellPanel.addEventListener('click', e => e.stopPropagation());
document.addEventListener('click', () => bellPanel.classList.add('hidden'));

document.getElementById('sound-toggle').addEventListener('click', () => {
    soundOn = !soundOn;
    try { localStorage.setItem('faculty_sound', soundOn ? 'on' : 'off'); } catch (e) {}
    renderSound();
    if (soundOn) playChime(); // click also unlocks audio in the browser
});

// Unlock audio on the first click anywhere (browser rule)
document.addEventListener('click', () => { if (soundOn) getCtx(); }, { once: true });

document.getElementById('toast-refresh').addEventListener('click', () => location.reload());

// Ring on load if there are new reports
if (Number(pageData.dataset.new) > 0) setTimeout(ringBell, 600);

// Check for new reports every 15 seconds by reading the same page
let knownTotal = Number(pageData.dataset.total);
setInterval(async () => {
    if (document.hidden) return;
    try {
        const url = new URL(location.href);
        url.searchParams.set('poll', '1'); // tells the controller not to reset "last seen"
        const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }, credentials: 'same-origin' });
        if (!res.ok) return;
        const doc = new DOMParser().parseFromString(await res.text(), 'text/html');
        const data = doc.getElementById('page-data');
        if (!data) return;

        const total = Number(data.dataset.total);

        if (total > knownTotal) {
            const added = total - knownTotal;
            knownTotal = total;
            bellBadge.textContent = (Number(bellBadge.textContent) || 0) + added;
            bellBadge.classList.remove('hidden');
            ringBell();
            toast.classList.remove('hidden');
            if (soundOn) playChime();
        }
    } catch (e) {}
}, 15000);
</script>

<!-- Report popup with notes form -->
<div id="note-modal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-blue-950/60 p-4">
    <div class="max-h-[92vh] w-full max-w-2xl overflow-y-auto rounded-3xl bg-white shadow-2xl">
        <div class="flex items-start justify-between gap-4 bg-gradient-to-b from-blue-950 to-blue-800 px-7 py-5 text-white">
            <div>
                <h3 id="m-title" class="text-xl font-extrabold capitalize"></h3>
                <p id="m-location" class="mt-0.5 text-sm text-blue-100"></p>
            </div>
            <button id="m-close" type="button" class="rounded-lg p-1.5 hover:bg-white/10" aria-label="Close">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
        </div>

        <div class="space-y-6 p-7">
            <div>
                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-slate-400">What happened</p>
                <p id="m-desc" class="leading-relaxed text-slate-600"></p>
            </div>

            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-400">Notes sent to admin</p>
                <div id="m-notes" class="space-y-2"></div>
                <p id="m-no-notes" class="hidden text-sm text-slate-400">There are no notes for this report yet.</p>
            </div>

            <form id="m-form" method="POST" class="space-y-4 border-t border-slate-100 pt-6">
                @csrf
                <input type="hidden" name="report_id" id="m-report-id" value="{{ old('report_id') }}">

                @if ($errors->any())
                    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm text-red-700">{{ $errors->first() }}</div>
                @endif

                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-blue-950">Your status</p>
                    <div class="grid gap-2 sm:grid-cols-3">
                        @foreach (['reviewing' => 'Reviewing', 'handling' => 'I will handle this', 'resolved' => 'Resolved'] as $val => $text)
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="{{ $val }}" class="peer sr-only" {{ old('status', 'reviewing') === $val ? 'checked' : '' }}>
                                <span class="block rounded-xl border border-slate-200 px-3 py-2.5 text-center text-sm font-semibold text-slate-600 transition peer-checked:border-blue-950 peer-checked:bg-blue-950 peer-checked:text-white peer-focus-visible:ring-4 peer-focus-visible:ring-blue-700/20">{{ $text }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="mb-2 flex items-end justify-between">
                        <label for="m-note" class="text-xs font-semibold uppercase tracking-wider text-blue-950">Note for the admin</label>
                        <span id="m-count" class="text-xs text-slate-400">0 / 1000</span>
                    </div>
                    <textarea id="m-note" name="note" rows="4" maxlength="1000" required
                        placeholder="e.g. Spoke with the students involved. Parents will be informed on Monday."
                        class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-[15px] outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">{{ old('note') }}</textarea>
                </div>

                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-red-600 to-red-700 py-3.5 font-bold text-white shadow-lg shadow-red-600/30 transition hover:from-red-700 hover:to-red-800">
                    Send note to admin
                </button>
            </form>
        </div>
    </div>
</div>

<script>
const modal = document.getElementById('note-modal');
const mForm = document.getElementById('m-form');
const mNote = document.getElementById('m-note');
const mCount = document.getElementById('m-count');

function openModal(card) {
    document.getElementById('m-title').textContent = card.dataset.title;
    document.getElementById('m-location').textContent = card.dataset.location ? '📍 ' + card.dataset.location : '';
    document.getElementById('m-desc').textContent = card.dataset.desc;
    document.getElementById('m-report-id').value = card.dataset.id;
    mForm.action = card.dataset.action;

    const list = document.getElementById('m-notes');
    list.innerHTML = '';
    const items = card.querySelectorAll('.note-item');
    document.getElementById('m-no-notes').classList.toggle('hidden', items.length > 0);
    items.forEach(n => {
        const box = document.createElement('div');
        box.className = 'rounded-xl border border-slate-200 bg-slate-50 p-3';

        const top = document.createElement('div');
        top.className = 'flex flex-wrap items-center gap-2 text-xs';
        const badge = document.createElement('span');
        badge.className = 'rounded-full border px-2.5 py-0.5 font-semibold ' + n.dataset.color;
        badge.textContent = n.dataset.status;
        const who = document.createElement('span');
        who.className = 'font-semibold text-blue-950';
        who.textContent = n.dataset.who;
        const when = document.createElement('span');
        when.className = 'text-slate-400';
        when.textContent = n.dataset.when;
        top.append(badge, who, when);

        const text = document.createElement('p');
        text.className = 'mt-2 whitespace-pre-line text-sm text-slate-600';
        text.textContent = n.dataset.text;

        box.append(top, text);
        list.appendChild(box);
    });

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
    setTimeout(() => mNote.focus(), 50);
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

document.querySelectorAll('.report-card').forEach(card => {
    card.addEventListener('click', e => {
        if (e.target.closest('a, video')) return; // evidence links and videos work normally
        openModal(card);
    });
    card.addEventListener('keydown', e => {
        if (e.key === 'Enter' && e.target === card) openModal(card);
    });
});
document.getElementById('m-close').addEventListener('click', closeModal);
modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

function updateNoteCount() { mCount.textContent = mNote.value.length + ' / 1000'; }
mNote.addEventListener('input', updateNoteCount);
updateNoteCount();

// Reopen the popup if the form failed validation
@if ($errors->any() && old('report_id'))
    const failedCard = document.querySelector('.report-card[data-id="{{ old('report_id') }}"]');
    if (failedCard) openModal(failedCard);
@endif
</script>

</body>
</html>