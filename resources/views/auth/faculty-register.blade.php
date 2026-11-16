<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <title>SafeReport - Faculty Registration</title>
</head>
<body class="min-h-screen bg-slate-50 text-[#1e2a4a] antialiased">

<main class="mx-auto flex min-h-screen max-w-6xl items-center px-4 py-10 md:px-6">
    <div class="grid w-full overflow-hidden rounded-3xl bg-white shadow-2xl shadow-[#14204a]/15 md:grid-cols-2">

        {{-- Left brand panel --}}
        <aside class="relative flex flex-col justify-between gap-12 bg-gradient-to-b from-[#14204a] via-[#26408b] to-[#14204a] p-8 text-white md:p-12">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI logo"
                     class="size-14 rounded-full bg-white object-contain ring-2 ring-red-600">
                <div class="leading-tight">
                    <div class="text-lg font-extrabold tracking-wide">SAFEREPORT<span class="text-red-500">.</span></div>
                    <div class="text-[10px] uppercase tracking-wide text-blue-100">Computer Communication Development Institute</div>
                </div>
            </a>

            <div>
                <h1 class="text-4xl font-extrabold leading-tight md:text-5xl">
                    Join Us, <span class="text-red-500">Protect</span> Our School.
                </h1>
                <p class="mt-4 text-lg text-blue-100">Request a faculty account to help review reports.</p>
            </div>

            <div class="flex flex-wrap gap-2.5">
                <span class="rounded-full border border-white/40 bg-white/10 px-4 py-1.5 text-sm font-semibold">100% Anonymous</span>
                <span class="rounded-full border border-white/40 bg-white/10 px-4 py-1.5 text-sm font-semibold">Fast Reporting</span>
                <span class="rounded-full border border-white/40 bg-white/10 px-4 py-1.5 text-sm font-semibold">Direct Action</span>
            </div>
        </aside>

        {{-- Right form panel --}}
        <section class="p-8 md:p-12">
            <h2 class="text-3xl font-extrabold text-[#14204a]">Faculty Registration</h2>
            <p class="mt-1.5 text-sm text-slate-500">Complete the form below to request a faculty account.</p>

            <div class="mt-6 flex items-start gap-3 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-[#26408b]">
                <svg class="mt-0.5 size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Your account will undergo verification by the administration before you can log in.</span>
            </div>

            <form method="POST" action="{{ url('/faculty/register') }}" class="mt-7">
                @csrf

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Faculty information --}}
                <fieldset class="mb-7">
                    <legend class="mb-4 w-full border-b border-slate-200 pb-2 text-base font-bold text-[#14204a]">Faculty information</legend>

                    <div class="space-y-5">
                        <div>
                            <label for="name" class="mb-2 block text-xs font-semibold uppercase tracking-wider">Full name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="faculty_id" class="mb-2 block text-xs font-semibold uppercase tracking-wider">Faculty ID</label>
                                <input id="faculty_id" type="text" name="faculty_id" value="{{ old('faculty_id') }}" required
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                            </div>
                            <div>
                                <label for="department" class="mb-2 block text-xs font-semibold uppercase tracking-wider">Department</label>
                                <input id="department" type="text" name="department" value="{{ old('department') }}" required
                                    placeholder="e.g. IT Department"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition placeholder:text-slate-400 focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                            </div>
                        </div>
                    </div>
                </fieldset>

                {{-- Account information --}}
                <fieldset class="mb-7">
                    <legend class="mb-4 w-full border-b border-slate-200 pb-2 text-base font-bold text-[#14204a]">Account information</legend>

                    <div class="space-y-5">
                        <div>
                            <label for="email" class="mb-2 block text-xs font-semibold uppercase tracking-wider">School email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="name@ccdi.edu.ph"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition placeholder:text-slate-400 focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="password" class="mb-2 block text-xs font-semibold uppercase tracking-wider">Password</label>
                                <input id="password" type="password" name="password" required minlength="8"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                                <p class="mt-1.5 text-xs text-slate-500">At least 8 characters.</p>
                            </div>
                            <div>
                                <label for="password_confirmation" class="mb-2 block text-xs font-semibold uppercase tracking-wider">Confirm password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                                <p id="match-hint" class="mt-1.5 min-h-4 text-xs"></p>
                            </div>
                        </div>

                        <label class="flex w-fit cursor-pointer items-center gap-2 text-sm text-slate-600">
                            <input id="show-pass" type="checkbox" class="size-4 rounded accent-[#14204a]">
                            Show passwords
                        </label>
                    </div>
                </fieldset>

                <button type="submit"
                    class="w-full rounded-xl bg-red-600 py-4 text-[15px] font-bold text-white shadow-lg shadow-red-600/30 transition hover:bg-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Submit registration
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500">
                Already have an account?
                <a href="{{ url('/faculty/login') }}" class="font-semibold text-[#26408b] hover:underline">Log in</a>
            </p>
            <p class="mt-3 text-center text-sm">
                <a href="{{ url('/') }}" class="font-semibold text-[#26408b] hover:underline">&larr; Back to SafeReport</a>
            </p>
        </section>
    </div>
</main>

<script>
const pw = document.getElementById('password');
const pc = document.getElementById('password_confirmation');
const hint = document.getElementById('match-hint');

document.getElementById('show-pass').addEventListener('change', e => {
    const type = e.target.checked ? 'text' : 'password';
    pw.type = type;
    pc.type = type;
});

function checkMatch() {
    if (!pc.value) { hint.textContent = ''; return; }
    const ok = pw.value === pc.value;
    hint.textContent = ok ? 'Passwords match.' : 'Passwords do not match yet.';
    hint.className = 'mt-1.5 min-h-4 text-xs ' + (ok ? 'text-emerald-600' : 'text-red-600');
}
pw.addEventListener('input', checkMatch);
pc.addEventListener('input', checkMatch);
</script>

</body>
</html>