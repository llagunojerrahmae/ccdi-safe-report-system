<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <title>SafeReport - Faculty Registration</title>
</head>
<body class="min-h-screen bg-slate-50 text-[#1e2a4a] antialiased">

    {{-- Header bar: same navy style as the landing page --}}
    <header class="bg-gradient-to-b from-[#14204a] to-[#1b2d6b] text-white">
        <div class="mx-auto flex max-w-4xl items-center justify-between gap-4 px-6 py-4">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI logo"
                     class="size-12 rounded-full bg-white object-contain ring-2 ring-red-600">
                <div class="leading-tight">
                    <div class="text-lg font-extrabold tracking-wide">SAFEREPORT<span class="text-red-500">.</span></div>
                    <div class="text-[10px] uppercase tracking-wide text-blue-100">Computer Communication Development Institute</div>
                </div>
            </a>
            <a href="{{ url('/faculty/login') }}"
               class="rounded-lg border border-white/50 px-4 py-2 text-sm font-semibold transition hover:bg-white/10">
                Faculty Login
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-2xl px-6 py-10">

        <div class="mb-6">
            <h1 class="text-3xl font-extrabold text-[#14204a]">Faculty Registration</h1>
            <p class="mt-1.5 text-sm text-slate-500">Complete the form below to request a faculty account.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-lg shadow-[#14204a]/5">

            <div class="mb-8 flex items-start gap-3 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-[#26408b]">
                <svg class="mt-0.5 size-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Your account will undergo verification by the administration before you can log in.</span>
            </div>

            <form method="POST" action="{{ url('/faculty/register') }}">
                @csrf

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Faculty information --}}
                <fieldset class="mb-8">
                    <legend class="mb-4 w-full border-b border-slate-200 pb-2 text-base font-bold text-[#14204a]">
                        Faculty information
                    </legend>

                    <div class="space-y-5">
                        <div>
                            <label for="name" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Full name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="faculty_id" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Faculty ID</label>
                                <input id="faculty_id" type="text" name="faculty_id" value="{{ old('faculty_id') }}" required
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                            </div>
                            <div>
                                <label for="department" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Department</label>
                                <input id="department" type="text" name="department" value="{{ old('department') }}" required
                                    placeholder="e.g. IT Department"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                            </div>
                        </div>
                    </div>
                </fieldset>

                {{-- Account information --}}
                <fieldset class="mb-8">
                    <legend class="mb-4 w-full border-b border-slate-200 pb-2 text-base font-bold text-[#14204a]">
                        Account information
                    </legend>

                    <div class="space-y-5">
                        <div>
                            <label for="email" class="block mb-2 text-xs font-semibold uppercase tracking-wider">School email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="name@ccdi.edu.ph"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="password" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Password</label>
                                <input id="password" type="password" name="password" required
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                                <p class="mt-1.5 text-xs text-slate-500">At least 8 characters.</p>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-xs font-semibold uppercase tracking-wider">Confirm password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5 text-[15px] outline-none transition focus:border-[#26408b] focus:ring-4 focus:ring-[#26408b]/15">
                            </div>
                        </div>
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
        </div>

        <p class="mt-6 text-center text-sm">
            <a href="{{ url('/') }}" class="font-semibold text-[#26408b] hover:underline">&larr; Back to SafeReport</a>
        </p>
    </main>

</body>
</html>