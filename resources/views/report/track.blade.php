<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Report - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-50 to-blue-50/60">

    <!-- Hero band: same navy style as the landing page -->
    <header class="relative overflow-hidden bg-gradient-to-b from-blue-950 via-blue-800 to-blue-950 px-6 pt-14 pb-32 text-center text-white">
        <div class="pointer-events-none absolute -left-24 -top-24 size-72 rounded-full bg-blue-400/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-16 size-72 rounded-full bg-red-500/15 blur-3xl"></div>

        <div class="relative">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo"
                 class="mx-auto mb-5 size-20 rounded-full border-2 border-red-600 bg-white object-cover shadow-xl shadow-black/30">
            <h1 class="text-3xl font-extrabold tracking-tight md:text-5xl">
                Track Your <span class="text-red-500">Report</span>
            </h1>
            <p class="mx-auto mt-3 max-w-md text-lg text-blue-100">Enter the tracking code you received after submitting.</p>
        </div>
    </header>

    <main class="mx-auto -mt-20 max-w-xl px-6 pb-16">

        <!-- Search card -->
        <div class="relative rounded-3xl border border-slate-200 bg-white p-6 shadow-2xl shadow-blue-950/15 md:p-8">

            <div class="absolute -top-6 left-1/2 grid size-12 -translate-x-1/2 place-items-center rounded-full bg-red-600 text-white shadow-lg shadow-red-600/40 ring-4 ring-white">
                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/>
                </svg>
            </div>

            <form action="{{ route('report.track.result') }}" method="POST" autocomplete="off" class="pt-4">
                @csrf
                <label for="tracking_code" class="mb-2 block text-center text-sm font-semibold text-blue-950">Tracking code</label>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <input id="tracking_code" type="text" name="tracking_code" value="{{ old('tracking_code') }}" required
                        placeholder="SR-2026-00147"
                        class="w-full flex-1 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-center text-lg font-semibold uppercase tracking-widest text-blue-950 outline-none transition placeholder:text-base placeholder:font-normal placeholder:normal-case placeholder:tracking-normal placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-700/15">

                    <button type="submit"
                        class="rounded-xl bg-gradient-to-r from-red-600 to-red-700 px-8 py-3.5 font-bold text-white shadow-lg shadow-red-600/30 transition hover:from-red-700 hover:to-red-800">
                        Check
                    </button>
                </div>

                @error('tracking_code')
                    <p class="mt-3 rounded-lg bg-red-50 px-3 py-2 text-center text-sm text-red-700">{{ $message }}</p>
                @enderror

                <p class="mt-4 text-center text-xs text-slate-500">
                    Your code looks like <span class="font-semibold text-slate-600">SR-2026-00147</span>.
                    Each code shows the status of one report only.
                </p>
            </form>
        </div>

        {{-- Search result --}}
        @if (isset($searched))
            <div class="mt-6">
                @if ($report)
                    @php
                        $statusStyles = [
                            'pending'   => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
                            'reviewing' => 'bg-blue-100 text-blue-800 ring-blue-200',
                            'resolved'  => 'bg-green-100 text-green-800 ring-green-200',
                            'dismissed' => 'bg-slate-200 text-slate-700 ring-slate-300',
                        ];
                        $steps = ['pending' => 'Pending', 'reviewing' => 'Reviewing', 'resolved' => 'Resolved'];
                        $stepKeys = array_keys($steps);
                        $current = array_search($report->status, $stepKeys);
                    @endphp

                    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-blue-950/10">

                        <!-- Result header -->
                        <div class="flex flex-wrap items-center justify-between gap-3 bg-gradient-to-r from-blue-950 to-blue-800 px-6 py-5 text-white">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-blue-200">Tracking code</p>
                                <p class="text-xl font-extrabold tracking-wide">{{ $report->tracking_code }}</p>
                            </div>
                            <span class="rounded-full px-4 py-1.5 text-xs font-bold uppercase tracking-wide ring-1 {{ $statusStyles[$report->status] ?? 'bg-slate-100 text-slate-700 ring-slate-200' }}">
                                {{ $report->status }}
                            </span>
                        </div>

                        <div class="space-y-6 p-6 md:p-8">

                            <!-- Details -->
                            <dl class="grid gap-4 sm:grid-cols-2">
                                <div class="rounded-2xl bg-slate-50 px-4 py-3.5">
                                    <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Incident type</dt>
                                    <dd class="mt-1 font-semibold capitalize text-blue-950">{{ str_replace('_', ' ', $report->incident_type) }}</dd>
                                </div>
                                <div class="rounded-2xl bg-slate-50 px-4 py-3.5">
                                    <dt class="text-xs font-medium uppercase tracking-wider text-slate-500">Date submitted</dt>
                                    <dd class="mt-1 font-semibold text-blue-950">{{ $report->created_at->format('M d, Y') }}</dd>
                                </div>
                            </dl>

                            <!-- Progress -->
                            @if ($report->status === 'dismissed')
                                <div class="flex items-start gap-3 rounded-2xl bg-slate-100 px-4 py-3.5 text-sm text-slate-600">
                                    <svg class="mt-0.5 size-5 shrink-0 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p>This report was reviewed and dismissed by the administration.</p>
                                </div>
                            @else
                                <div>
                                    <p class="mb-4 text-sm font-semibold text-blue-950">Progress</p>
                                    <ol class="flex items-start">
                                        @foreach ($steps as $key => $label)
                                            @php
                                                $index = array_search($key, $stepKeys);
                                                $done = $current !== false && $index <= $current;
                                                $isCurrent = $current !== false && $index === $current;
                                            @endphp
                                            <li class="relative flex flex-1 flex-col items-center text-center">
                                                @if (! $loop->first)
                                                    <span class="absolute right-1/2 top-4 h-0.5 w-full {{ $done ? 'bg-blue-900' : 'bg-slate-200' }}"></span>
                                                @endif
                                                <span class="relative z-10 grid size-8 place-items-center rounded-full text-sm font-bold
                                                    {{ $done ? 'bg-blue-900 text-white' : 'bg-slate-200 text-slate-500' }}
                                                    {{ $isCurrent ? 'ring-4 ring-blue-200' : '' }}">
                                                    @if ($done && ! $isCurrent)
                                                        &#10003;
                                                    @else
                                                        {{ $index + 1 }}
                                                    @endif
                                                </span>
                                                <span class="mt-2 text-xs font-semibold {{ $done ? 'text-blue-950' : 'text-slate-400' }}">{{ $label }}</span>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif

                            <!-- Admin update -->
                            @if ($report->admin_notes)
                                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-4">
                                    <p class="mb-1 flex items-center gap-2 text-sm font-semibold text-blue-950">
                                        <svg class="size-4 text-blue-800" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM21 12c0 4.556-4.03 8.25-9 8.25a9.76 9.76 0 01-2.555-.337L5.4 21l.97-3.03C4.9 16.6 3 14.4 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
                                        </svg>
                                        Update from Admin
                                    </p>
                                    <p class="text-sm leading-relaxed text-slate-700">{{ $report->admin_notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="rounded-3xl border border-red-200 bg-white p-6 text-center shadow-lg shadow-red-600/5">
                        <div class="mx-auto mb-3 grid size-12 place-items-center rounded-full bg-red-50 text-red-600">
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="font-semibold text-blue-950">No report found</p>
                        <p class="mt-1 text-sm text-slate-500">No report found with that tracking code. Please check and try again.</p>
                    </div>
                @endif
            </div>
        @else
            <!-- How tracking works (shown before searching) -->
            <section class="mt-10">
                <h2 class="mb-4 text-center text-sm font-bold uppercase tracking-wider text-blue-900">How tracking works</h2>
                <ol class="grid gap-3 sm:grid-cols-3">
                    <li class="rounded-2xl border border-slate-200 bg-white p-4 text-center shadow-sm">
                        <span class="mx-auto mb-2 grid size-9 place-items-center rounded-full bg-blue-100 text-sm font-bold text-blue-900">1</span>
                        <p class="text-sm font-semibold text-blue-950">Submit a report</p>
                        <p class="mt-1 text-xs leading-snug text-slate-500">Fill in the anonymous report form.</p>
                    </li>
                    <li class="rounded-2xl border border-slate-200 bg-white p-4 text-center shadow-sm">
                        <span class="mx-auto mb-2 grid size-9 place-items-center rounded-full bg-blue-100 text-sm font-bold text-blue-900">2</span>
                        <p class="text-sm font-semibold text-blue-950">Save your code</p>
                        <p class="mt-1 text-xs leading-snug text-slate-500">You get a tracking code after submitting.</p>
                    </li>
                    <li class="rounded-2xl border border-slate-200 bg-white p-4 text-center shadow-sm">
                        <span class="mx-auto mb-2 grid size-9 place-items-center rounded-full bg-blue-100 text-sm font-bold text-blue-900">3</span>
                        <p class="text-sm font-semibold text-blue-950">Check the status</p>
                        <p class="mt-1 text-xs leading-snug text-slate-500">Enter the code here to see updates.</p>
                    </li>
                </ol>
            </section>
        @endif

        <p class="mt-4 text-center text-sm">
            <a href="{{ route('report.create') }}" class="font-semibold text-blue-800 hover:underline">&larr; Back to SafeReport</a>
        </p>
    </main>

</body>
</html>