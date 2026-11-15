<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-950 to-blue-900 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-12 h-12 rounded-full object-cover border-2 border-red-600">
            <div>
                <h1 class="text-white font-extrabold text-xl tracking-wide leading-tight">SAFEREPORT<span class="text-red-500">.</span></h1>
                <p class="text-blue-200 text-[11px] tracking-wider uppercase">Computer Communication Development Institute</p>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-8 text-blue-100 font-medium text-sm">
            <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
            <a href="{{ route('report.track') }}" class="hover:text-white transition">Track Report</a>
            <a href="{{ route('about') }}" class="hover:text-white transition">About Us</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
            <a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a>
        </div>

        <div class="flex items-center gap-3">
            <span class="text-blue-100 text-sm font-medium hidden sm:inline">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('faculty.logout') }}">
                @csrf
                <button type="submit"
                    class="border border-blue-300 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="bg-gradient-to-b from-blue-900 to-blue-800 text-white text-center py-12 px-6">
    <h2 class="text-4xl font-extrabold">Faculty <span class="text-red-500">Dashboard</span></h2>
    <p class="mt-2 text-blue-100">Anonymous reports from students.</p>
</section>

<main class="max-w-3xl mx-auto px-6 py-10">

    @if ($newCount > 0)
        <span class="inline-block bg-red-600 text-white font-bold px-5 py-2 rounded-full shadow-lg shadow-red-600/30 mb-6">
            {{ $newCount }} new report
        </span>
    @endif

    {{-- NEW: Search bar --}}
    <div class="relative mb-6">
        <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"/>
        </svg>
        <input
            type="text"
            id="reportSearch"
            placeholder="Search for a report (type, room, description...)"
            autocomplete="off"
            class="w-full pl-12 pr-4 py-3 rounded-2xl border border-slate-200 bg-white shadow-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
    </div>

    {{-- NEW: Walang nahanap message --}}
    <p id="noResults" class="hidden text-center text-slate-500 py-10">Walang nahanap na report.</p>

    @forelse ($reports as $report)
        {{-- NEW: dinagdag ang "report-card" class --}}
        <div class="report-card bg-white rounded-2xl shadow-md border border-slate-100 p-6 mb-4">
            <h3 class="text-blue-950 font-bold text-lg capitalize">{{ str_replace('_', ' ', $report->incident_type) }}</h3>
            @if ($report->location)
                <p class="text-slate-500 text-sm mt-0.5">📍 {{ $report->location }}</p>
            @endif
            <p class="text-slate-600 mt-3 leading-relaxed">{{ $report->description }}</p>

            {{-- Evidence --}}
            @if (!empty($report->evidence_paths))
                <div class="mt-4">
                    <p class="text-xs uppercase text-slate-400 font-semibold mb-2">Evidence</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach ($report->evidence_paths as $path)
                            @php
                                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                $url = asset('storage/' . $path);
                            @endphp

                            @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <a href="{{ $url }}" target="_blank">
                                    <img src="{{ $url }}" alt="Evidence"
                                         class="w-full h-32 object-cover rounded-lg border border-slate-200 hover:opacity-90 transition">
                                </a>
                            @elseif (in_array($ext, ['mp4', 'mov', 'webm']))
                                <video controls preload="metadata"
                                       class="w-full h-32 rounded-lg border border-slate-200 bg-black">
                                    <source src="{{ $url }}">
                                </video>
                            @else
                                <a href="{{ $url }}" target="_blank" class="text-blue-700 text-sm hover:underline break-all">
                                    {{ basename($path) }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <p class="text-slate-400 text-xs mt-4">{{ $report->created_at->diffForHumans() }}</p>
        </div>
    @empty
        <p class="text-center text-slate-500 py-10">Wala pang report.</p>
    @endforelse

    <div class="mt-6">
        {{ $reports->links() }}
    </div>
</main>

{{-- NEW: Search script --}}
<script>
    const searchInput = document.getElementById('reportSearch');
    const noResults = document.getElementById('noResults');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        const cards = document.querySelectorAll('.report-card');
        let visible = 0;

        cards.forEach(card => {
            const match = card.innerText.toLowerCase().includes(keyword);
            card.classList.toggle('hidden', !match);
            if (match) visible++;
        });

        noResults.classList.toggle('hidden', visible > 0 || cards.length === 0);
    });
</script>

</body>
</html>