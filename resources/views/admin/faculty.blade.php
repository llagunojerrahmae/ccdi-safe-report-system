<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Requests</title>
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
<main class="flex-1 min-w-0 p-6 lg:p-10 space-y-10">

    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-blue-950">Faculty Requests<span class="text-red-600">.</span></h2>
        <div class="w-12 h-1 bg-red-600 rounded-full mt-2"></div>
        <p class="text-slate-500 text-sm mt-3">Review and manage faculty access to SafeReport.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 text-sm text-green-800 bg-green-50 border border-green-200 border-l-4 border-l-green-600 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Pending -->
    <section>
        <div class="flex items-center gap-3 mb-1">
            <h3 class="text-blue-950 font-extrabold text-xl">Pending Faculty Requests</h3>
            <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-yellow-100 text-yellow-700">{{ count($pending) }}</span>
        </div>
        <p class="text-slate-500 text-sm mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
            Verify first if they are truly a CCDI faculty member before approving.
        </p>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-blue-950 text-blue-100 text-[11px] uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4 font-semibold">Name</th>
                        <th class="text-left px-6 py-4 font-semibold">Email</th>
                        <th class="text-left px-6 py-4 font-semibold">Faculty ID</th>
                        <th class="text-left px-6 py-4 font-semibold">Department</th>
                        <th class="text-left px-6 py-4 font-semibold">Requested</th>
                        <th class="text-right px-6 py-4 font-semibold">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($pending as $f)
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 shrink-0 rounded-full bg-blue-950 text-white text-xs font-bold flex items-center justify-center">{{ strtoupper(mb_substr($f->name, 0, 1)) }}</span>
                                    <span class="font-bold text-blue-950">{{ $f->name }}</span>
                                </div>
                                </td>
                                <td class="px-6 py-4 text-slate-600">{{ $f->email }}</td>
                                <td class="px-6 py-4 font-semibold text-blue-900 whitespace-nowrap">{{ $f->faculty_id }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ $f->department }}</td>
                                <td class="px-6 py-4 text-slate-500 whitespace-nowrap">{{ $f->created_at?->diffForHumans() }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <form action="{{ route('admin.faculty.approve', $f) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm transition">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.faculty.reject', $f) }}" method="POST"
                                              onsubmit="return confirm('Reject this faculty request?')">
                                            @csrf @method('PATCH')
                                            <button class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm transition">Reject</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="w-12 h-12 mx-auto rounded-full bg-slate-100 flex items-center justify-center"><svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/></svg></div>
                                    <p class="text-slate-500 font-semibold mt-3">No pending request.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Approved / Rejected -->
    <section>
        <h3 class="text-blue-950 font-extrabold text-xl mb-4">Faculty Accounts</h3>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-blue-950 text-blue-100 text-[11px] uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4 font-semibold">Name</th>
                        <th class="text-left px-6 py-4 font-semibold">Email</th>
                        <th class="text-left px-6 py-4 font-semibold">Faculty ID</th>
                        <th class="text-left px-6 py-4 font-semibold">Department</th>
                        <th class="text-left px-6 py-4 font-semibold">Status</th>
                        <th class="text-right px-6 py-4 font-semibold">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($others as $f)
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 shrink-0 rounded-full bg-blue-950 text-white text-xs font-bold flex items-center justify-center">{{ strtoupper(mb_substr($f->name, 0, 1)) }}</span>
                                    <span class="font-bold text-blue-950">{{ $f->name }}</span>
                                </div>
                                </td>
                                <td class="px-6 py-4 text-slate-600">{{ $f->email }}</td>
                                <td class="px-6 py-4 font-semibold text-blue-900 whitespace-nowrap">{{ $f->faculty_id }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ $f->department }}</td>
                                <td class="px-6 py-4">
                                    @if($f->status === 'approved')
                                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1 rounded-full uppercase ring-1 ring-inset bg-green-50 text-green-700 ring-green-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>Approved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold px-3 py-1 rounded-full uppercase ring-1 ring-inset bg-red-50 text-red-700 ring-red-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end">
                                        @if($f->status === 'approved')
                                            <form action="{{ route('admin.faculty.reject', $f) }}" method="POST"
                                                  onsubmit="return confirm('Revoke access of this faculty?')">
                                                @csrf @method('PATCH')
                                                <button class="border border-red-300 text-red-600 hover:bg-red-600 hover:text-white hover:border-red-600 text-xs font-bold px-4 py-2 rounded-lg transition">Revoke</button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.faculty.approve', $f) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button class="border border-emerald-300 text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 text-xs font-bold px-4 py-2 rounded-lg transition">Approve</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="w-12 h-12 mx-auto rounded-full bg-slate-100 flex items-center justify-center"><svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/></svg></div>
                                    <p class="text-slate-500 font-semibold mt-3">No faculty account.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main>

</body>
</html>