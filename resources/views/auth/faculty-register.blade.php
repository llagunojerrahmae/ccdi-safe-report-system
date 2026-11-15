<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeReport - Faculty Registration</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-8">
        <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-16 h-16 mx-auto mb-3 rounded-full object-cover border-2 border-red-600 shadow-md">
        <h1 class="text-2xl font-black tracking-wide text-blue-950">
            SAFEREPORT<span class="text-red-500">.</span>
        </h1>
        <p class="text-slate-500 text-sm font-medium mt-1">Faculty Registration</p>
    </div>

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-slate-100">

        <div class="bg-blue-50 text-blue-900 p-3 rounded-lg text-xs mb-5 border border-blue-100 leading-relaxed">
            Your account will undergo verification by the administration before you can log in.
        </div>

        <form action="{{ route('faculty.register.store') }}" method="POST" class="space-y-4" autocomplete="off">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none">
                @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">School Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="name@ccdi.edu.ph">
                @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="faculty_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Faculty ID</label>
                <input type="text" id="faculty_id" name="faculty_id" value="{{ old('faculty_id') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none">
                @error('faculty_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="department" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Department</label>
                <input type="text" id="department" name="department" value="{{ old('department') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none"
                    placeholder="e.g. IT Department">
                @error('department') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none">
                <p class="text-xs text-slate-400 mt-1">At least 8 characters.</p>
                @error('password') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-blue-50/30 focus:bg-white focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20 text-slate-800 text-sm transition outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-950 hover:bg-blue-900 text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition duration-200 tracking-wider text-sm uppercase">
                REGISTER
            </button>
        </form>

        <p class="text-center text-sm text-slate-500 mt-6">
            Do you already have an account?
            <a href="{{ route('faculty.login') }}" class="text-blue-800 font-semibold hover:underline">Faculty Login</a>
        </p>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('home') }}" class="text-xs font-semibold text-blue-900 hover:underline transition">&larr; Back to SafeReport</a>
    </div>

</body>
</html>