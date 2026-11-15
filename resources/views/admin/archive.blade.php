<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 flex min-h-screen font-sans antialiased">

@php
    $pendingFaculty = \App\Models\User::where('role', 'faculty')->where('status', 'pending')->count();
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

    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-blue-950">Archive<span class="text-red-600">.</span></h2>
        <div class="w-12 h-1 bg-red-600 rounded-full mt-2"></div>
        <p class="text-slate-500 text-sm mt-3">Reports that were moved out of the dashboard. You can restore them anytime.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-green-800 bg-green-50 border border-green-200 border-l-4 border-l-green-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-blue-950 text-blue-100 text-[11px] uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4 font-semibold">Tracking Code</th>
                        <th class="text-left px-6 py-4 font-semibold">Type</th>
                        <th class="text-left px-6 py-4 font-semibold">Location</th>
                        <th class="text-left px-6 py-4 font-semibold">Description</th>
                        <th class="text-left px-6 py-4 font-semibold">Archived On</th>
                        <th class="text-right px-6 py-4 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($reports as $report)
                        <tr class="hover:bg-blue-50/50 transition">
                            <td class="px-6 py-4 font-bold text-blue-900 whitespace-nowrap">{{ $report->tracking_code }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $report->incident_label }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $report->location }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ \Illuminate\Support\Str::limit($report->description, 50) }}</td>
                            <td class="px-6 py-4 text-slate-500 whitespace-nowrap">{{ $report->deleted_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.reports.restore', $report->id) }}" method="POST"
                                      onsubmit="return confirm('Restore this report to the dashboard?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-900 bg-blue-50 hover:bg-blue-950 hover:text-white px-3.5 py-1.5 rounded-lg transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/></svg>
                                        Restore
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">
                                <div class="w-12 h-12 mx-auto rounded-full bg-slate-100 flex items-center justify-center"><svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/></svg></div>
                                <p class="text-slate-500 font-semibold mt-3">No archived reports.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $reports->links() }}
    </div>
</main>

</body>
</html>