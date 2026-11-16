@php
    $total = $report->notes_count ?? 0;
    $fresh = $report->new_notes_count ?? 0;
@endphp

@if ($total > 0)
    <span class="inline-flex items-center gap-1.5 rounded-full border px-2.5 py-1 text-xs font-semibold
        {{ $fresh > 0 ? 'border-red-200 bg-red-50 text-red-600' : 'border-slate-200 bg-slate-50 text-slate-500' }}">
        <svg class="size-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5m-9 6l3-3h11a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v14z"/></svg>
        {{ $fresh > 0 ? $fresh . ' new' : $total . ' ' . \Illuminate\Support\Str::plural('note', $total) }}
    </span>
@else
    <span class="text-xs text-slate-300">None</span>
@endif