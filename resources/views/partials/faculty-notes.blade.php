@php
    $labels = ['reviewing' => 'Reviewing', 'handling' => 'Faculty will handle this', 'resolved' => 'Resolved by faculty'];
    $badge = [
        'reviewing' => 'bg-blue-100 text-blue-800 ring-blue-300',
        'handling'  => 'bg-amber-100 text-amber-800 ring-amber-300',
        'resolved'  => 'bg-emerald-100 text-emerald-800 ring-emerald-300',
    ];
    $accent = [
        'reviewing' => 'border-l-blue-600',
        'handling'  => 'border-l-amber-500',
        'resolved'  => 'border-l-emerald-600',
    ];
    $notes = $report->notes;
    $newCount = $notes->whereNull('seen_by_admin_at')->count();
    $hasNew = $newCount > 0;
@endphp

@if ($notes->isEmpty())
    <section id="faculty-notes" class="mt-6 flex items-center gap-4 rounded-2xl border border-dashed border-slate-300 bg-white/60 px-6 py-5">
        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-400">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
        </span>
        <div>
            <p class="text-sm font-bold text-slate-600">No faculty notes yet</p>
            <p class="text-xs text-slate-400">Updates from faculty about this report will appear here.</p>
        </div>
    </section>
@else
    <section id="faculty-notes" class="mt-6 overflow-hidden rounded-3xl border {{ $hasNew ? 'border-red-300 shadow-xl shadow-red-600/10' : 'border-slate-200 shadow-sm' }} bg-white">

        {{-- Header --}}
        <div class="relative flex flex-wrap items-center gap-4 px-7 py-5 text-white {{ $hasNew ? 'bg-gradient-to-r from-red-600 via-red-600 to-rose-500' : 'bg-gradient-to-r from-blue-950 to-blue-800' }}">
            <div class="relative shrink-0">
                @if ($hasNew)
                    <span class="absolute inset-0 animate-ping rounded-full bg-white/40"></span>
                @endif
                <span class="relative flex h-12 w-12 items-center justify-center rounded-full bg-white/20 ring-2 ring-white/40">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
                </span>
                @if ($hasNew)
                    <span class="absolute -right-1 -top-1 flex h-6 min-w-6 items-center justify-center rounded-full bg-white px-1.5 text-xs font-extrabold text-red-600 shadow">{{ $newCount }}</span>
                @endif
            </div>

            <div class="min-w-0 flex-1">
                <h3 class="text-xl font-extrabold leading-tight">
                    @if ($hasNew)
                        {{ $newCount }} new {{ \Illuminate\Support\Str::plural('note', $newCount) }} from faculty
                    @else
                        Faculty Notes
                    @endif
                </h3>
                <p class="mt-0.5 text-sm {{ $hasNew ? 'text-red-100' : 'text-blue-200' }}">
                    @if ($hasNew)
                        Latest update {{ $notes->first()->created_at->diffForHumans() }}. Please review below.
                    @else
                        All notes have been read.
                    @endif
                </p>
            </div>

            <span class="rounded-full bg-white/15 px-3.5 py-1.5 text-xs font-bold ring-1 ring-white/30">
                {{ $notes->count() }} {{ \Illuminate\Support\Str::plural('note', $notes->count()) }} total
            </span>
        </div>

        {{-- Notes --}}
        <div class="space-y-4 bg-slate-50/70 p-6">
            @foreach ($notes as $n)
                @php
                    $name = $n->user->name ?? 'Faculty';
                    $initials = collect(explode(' ', trim($name)))->filter()->take(2)->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))->implode('');
                    $isNew = is_null($n->seen_by_admin_at);
                @endphp

                <article class="relative rounded-2xl border border-l-[6px] {{ $accent[$n->status] ?? 'border-l-slate-400' }} p-5 transition hover:shadow-md
                    {{ $isNew ? 'border-red-200 bg-white shadow-lg shadow-red-600/10 ring-1 ring-red-200' : 'border-slate-200 bg-white' }}">

                    @if ($isNew)
                        <span class="absolute -right-2 -top-2 flex items-center gap-1.5 rounded-full bg-red-600 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-white shadow-lg">
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-white"></span>
                            </span>
                            New
                        </span>
                    @endif

                    <div class="flex flex-wrap items-center gap-3">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-900 to-blue-700 text-sm font-bold text-white shadow">
                            {{ $initials ?: 'F' }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-extrabold text-blue-950">{{ $name }}</p>
                            <p class="text-xs text-slate-400" title="{{ $n->created_at->format('M d, Y g:i A') }}">
                                {{ $n->created_at->diffForHumans() }} · {{ $n->created_at->format('M d, g:i A') }}
                            </p>
                        </div>

                        <span class="ml-auto inline-flex items-center gap-1.5 rounded-full px-3.5 py-1.5 text-xs font-bold ring-1 ring-inset {{ $badge[$n->status] ?? 'bg-slate-100 text-slate-700 ring-slate-300' }}">
                            @if ($n->status === 'resolved')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif ($n->status === 'handling')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @else
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @endif
                            {{ $labels[$n->status] ?? ucfirst($n->status) }}
                        </span>
                    </div>

                    <p class="mt-4 whitespace-pre-line rounded-xl {{ $isNew ? 'bg-red-50/60' : 'bg-slate-50' }} px-4 py-3.5 text-[15px] leading-relaxed text-slate-700">{{ $n->note }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endif