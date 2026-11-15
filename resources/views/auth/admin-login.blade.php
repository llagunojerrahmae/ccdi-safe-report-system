<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">

    <!-- Header Section -->
    <div class="text-center mb-8">
        <!-- CCDI Logo -->
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-16 h-16 mx-auto mb-3 rounded-full object-cover border-2 border-red-600 shadow-md">
        
        <h1 class="text-2xl font-black tracking-wide text-blue-950">
            SAFEREPORT<span class="text-red-500">.</span>
        </h1>
        <p class="text-slate-500 text-sm font-medium mt-1">Admin Portal Login</p>
    </div>

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        
        <!-- Flash Messages / Errors -->
        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-4 border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5" autocomplete="off">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                    Email Address
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="admin@ccdi.edu.ph">
                @error('email')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                    Password
                </label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="••••••••••••">
                @error('password')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" 
                    class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-900">
                <label for="remember" class="ml-2 text-xs text-slate-600 font-medium">
                    Remember me
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-blue-950 hover:bg-blue-900 text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition duration-200 tracking-wider text-sm uppercase">
                LOG IN
            </button>
        </form>
    </div>

    <!-- Back Link -->
    <div class="mt-8 text-center">
        <a href="/" class="text-xs font-semibold text-blue-900 hover:underline transition flex items-center justify-center gap-1">
            &larr; Back to SafeReport
        </a>
    </div>

</body>
</html>