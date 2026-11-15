<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Requests</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen">

<nav class="bg-gradient-to-r from-blue-950 to-blue-900 shadow-lg">
    <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-10 h-10 rounded-full object-cover border-2 border-red-600">
            <h1 class="text-white font-extrabold text-lg tracking-wide">SAFEREPORT<span class="text-red-500">.</span> <span class="text-blue-200 text-sm font-medium">Admin</span></h1>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-100 text-sm font-semibold hover:text-white transition">&larr; Dashboard</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="border border-blue-300 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 transition">Log Out</button>
            </form>
        </div>
    </div>
</nav>

<div class="max-w-6xl mx-auto px-6 py-10 space-y-10">

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-3 rounded-lg text-sm border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pending -->
    <section>
        <h2 class="text-blue-950 font-extrabold text-xl mb-1">Pending Faculty Requests</h2>
        <p class="text-slate-500 text-sm mb-4">Verify first if they are truly a CCDI faculty member before approving.</p>

        <div class="bg-white rounded-xl shadow-md border border-slate-100 overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Faculty ID</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3">Requested</th>
                        <th class="px-4 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pending as $f)
                        <tr>
                            <td class="px-4 py-3 font-semibold text-slate-800">{{ $f->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->email }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->faculty_id }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->department }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $f->created_at?->diffForHumans() }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-2">
                                    <form action="{{ route('admin.faculty.approve', $f) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.faculty.reject', $f) }}" method="POST"
                                          onsubmit="return confirm('Reject this faculty request?')">
                                        @csrf @method('PATCH')
                                        <button class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">No pending request.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Approved / Rejected -->
    <section>
        <h2 class="text-blue-950 font-extrabold text-xl mb-4">Faculty Accounts</h2>

        <div class="bg-white rounded-xl shadow-md border border-slate-100 overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Faculty ID</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($others as $f)
                        <tr>
                            <td class="px-4 py-3 font-semibold text-slate-800">{{ $f->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->email }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->faculty_id }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $f->department }}</td>
                            <td class="px-4 py-3">
                                @if($f->status === 'approved')
                                    <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full">Approved</span>
                                @else
                                    <span class="bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded-full">Rejected</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-end">
                                    @if($f->status === 'approved')
                                        <form action="{{ route('admin.faculty.reject', $f) }}" method="POST"
                                              onsubmit="return confirm('Revoke access of this faculty?')">
                                            @csrf @method('PATCH')
                                            <button class="border border-red-300 text-red-600 hover:bg-red-50 text-xs font-bold px-3 py-1.5 rounded-lg transition">Revoke</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.faculty.approve', $f) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="border border-emerald-300 text-emerald-700 hover:bg-emerald-50 text-xs font-bold px-3 py-1.5 rounded-lg transition">Approve</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">No faculty account.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>

</body>
</html>