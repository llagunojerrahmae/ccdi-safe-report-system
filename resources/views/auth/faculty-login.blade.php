<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-8">
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-16 h-16 mx-auto mb-3 rounded-full object-cover border-2 border-red-600 shadow-md">
        <h1 class="text-2xl font-black tracking-wide text-blue-950">
            SAFEREPORT<span class="text-red-500">.</span>
        </h1>
        <p class="text-slate-500 text-sm font-medium mt-1">Faculty Portal Login</p>
    </div>

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-slate-100">

        @if(session('success'))
            <div class="bg-emerald-50 text-emerald-700 p-3 rounded-lg text-sm mb-4 border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('faculty.login.store') }}" method="POST" class="space-y-5" autocomplete="off">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="faculty@ccdi.edu.ph">
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="••••••••••••">
                @error('password')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-950 hover:bg-blue-900 text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition duration-200 tracking-wider text-sm uppercase">
                LOG IN
            </button>
        </form>

        <p class="text-center text-sm text-slate-500 mt-6">
            Don't have an account yet?
            <a href="{{ route('faculty.register') }}" class="text-blue-800 font-semibold hover:underline">Register as Faculty</a>
        </p>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('home') }}" class="text-xs font-semibold text-blue-900 hover:underline transition">&larr; Back to SafeReport</a>
    </div>

</body>
</html>