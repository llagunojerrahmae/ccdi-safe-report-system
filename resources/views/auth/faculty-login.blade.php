<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <title>SafeReport - Faculty Login</title>
</head>
<body class="min-h-screen bg-slate-50 text-[#1e2a4a] antialiased flex items-center justify-center p-6">

    <main class="w-full max-w-4xl grid md:grid-cols-[1.1fr_1fr] bg-white rounded-[28px] shadow-2xl shadow-[#14204a]/20 overflow-hidden">

        {{-- Left panel: same navy hero style as the landing page --}}
        <section class="flex flex-col justify-between gap-10 p-8 md:p-12 text-white bg-gradient-to-b from-[#14204a] via-[#26408b] to-[#14204a]">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI logo"
                     class="size-14 rounded-full bg-white object-contain ring-2 ring-red-600">
                <div class="leading-tight">
                    <div class="text-xl font-extrabold tracking-wide">SAFEREPORT<span class="text-red-500">.</span></div>
                    <div class="text-[10px] uppercase tracking-wide text-blue-100">Computer Communication Development Institute</div>
                </div>
            </div>

            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-[1.08] tracking-tight mb-4">
                    Stay Informed, <span class="text-red-500">Protect</span> Our School.
                </h1>
                <p class="text-blue-100 text-lg leading-relaxed">Follow the reports you handle and keep every case confidential.</p>
            </div>

            <div class="flex flex-wrap gap-2.5">
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">100% Anonymous</span>
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">Fast Reporting</span>
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">Direct Action</span>
            </div>
        </section>

        {{-- Right panel --}}
        <section class="flex flex-col justify-center p-8 md:p-12">
            <h2 class="text-3xl font-extrabold text-[#14204a] mb-1.5">Faculty Portal Login</h2>
            <p class="text-sm text-slate-500 mb-7">Sign in with your faculty account to view reports.</p>

            <form method="POST" action="{{ url('/faculty/login') }}" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div>
                    <label for="email" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="faculty@ccdi.edu.ph"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                </div>

                <div>
                    <label for="password" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Password</label>
                    <input id="password" type="password" name="password" required
                        placeholder="Enter your password"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                </div>

                <button type="submit"
                    class="w-full rounded-xl bg-red-600 py-4 text-[15px] font-bold text-white shadow-lg shadow-red-600/30 transition hover:bg-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Log in
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500">
                Don't have an account yet?
                <a href="{{ url('/faculty/register') }}" class="font-semibold text-[#26408b] hover:underline">Register as Faculty</a>
            </p>

            <p class="mt-4 text-center text-sm">
                <a href="{{ url('/') }}" class="font-semibold text-[#26408b] hover:underline">&larr; Back to SafeReport</a>
            </p>
        </section>
    </main>

</body>
</html>