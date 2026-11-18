<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <title>SafeReport - Admin Login</title>
</head>
<body class="min-h-screen bg-slate-50 text-[#1e2a4a] antialiased flex items-center justify-center p-6">

    <main class="w-full max-w-4xl grid md:grid-cols-[1.1fr_1fr] bg-white rounded-[28px] shadow-2xl shadow-[#14204a]/20 overflow-hidden">

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
                    Review Reports, <span class="text-red-500">Protect</span> Our School.
                </h1>
                <p class="text-blue-100 text-lg leading-relaxed">Every report stays safe and confidential.</p>
            </div>

            <div class="flex flex-wrap gap-2.5">
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">100% Anonymous</span>
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">Fast Reporting</span>
                <span class="text-xs font-semibold border border-white/40 bg-white/10 rounded-full px-3.5 py-2">Direct Action</span>
            </div>
        </section>

        {{-- Right panel --}}
        <section class="flex flex-col justify-center p-8 md:p-12">
            <h2 class="text-3xl font-extrabold text-[#14204a] mb-1.5">Admin Portal Login</h2>
            <p class="text-sm text-slate-500 mb-7">Sign in with your admin account to manage reports.</p>

            <form method="POST" action="{{ url('/admin/login') }}" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div>
                    <label for="email" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="admin@ccdi.edu.ph"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                </div>

                <div>
                    <label for="password" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Password</label>
                    <input id="password" type="password" name="password" required
                        placeholder="Enter your password"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                </div>

                <label class="flex items-center gap-2.5 text-sm">
                    <input type="checkbox" name="remember" class="size-[18px] rounded accent-[#14204a]">
                    Remember me
                </label>

                <button type="submit"
                    class="w-full rounded-xl bg-red-600 py-4 text-[15px] font-bold text-white shadow-lg shadow-red-600/30 transition hover:bg-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Log in
                </button>
            </form>

            <p class="mt-6 text-center text-sm">
                <a href="{{ url('/') }}" class="font-semibold text-[#26408b] hover:underline">&larr; Back to SafeReport</a>
            </p>

            {{-- Test account (for evaluation) --}}
            <div class="mt-6 rounded-xl border border-dashed border-[#26408b]/40 bg-[#26408b]/5 px-4 py-3.5 text-sm">
                <div class="mb-2 flex items-center justify-between gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#26408b]">Test Account (for evaluation)</span>
                    <button type="button" id="use-test-account"
                        class="rounded-full border border-[#26408b] px-3 py-1 text-xs font-semibold text-[#26408b] transition hover:bg-[#26408b] hover:text-white">
                        Use test account
                    </button>
                </div>
                <dl class="space-y-1 text-slate-600">
                    <div class="flex gap-2">
                        <dt class="w-20 font-semibold text-[#14204a]">Email:</dt>
                        <dd id="test-email" class="select-all">testadmin@ccdi.edu.ph</dd>
                    </div>
                    <div class="flex gap-2">
                        <dt class="w-20 font-semibold text-[#14204a]">Password:</dt>
                        <dd id="test-password" class="select-all">TestAdmin123</dd>
                    </div>
                </dl>
            </div>
        </section>
    </main>

    <script>
        document.getElementById('use-test-account').addEventListener('click', function () {
            document.getElementById('email').value = document.getElementById('test-email').textContent.trim();
            document.getElementById('password').value = document.getElementById('test-password').textContent.trim();
        });
    </script>

</body>
</html>