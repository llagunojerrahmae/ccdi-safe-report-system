<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - SafeReport</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center px-6 py-12">

<div class="w-full max-w-3xl">
    <div class="text-center mb-8">
        <div class="w-16 h-16 mx-auto rounded-full border-2 border-red-600 flex items-center justify-center bg-white shadow-md overflow-hidden">
            <img src="{{ asset('logo/logo.jpg') }}" alt="CCDI Logo" class="w-full h-full object-cover">
        </div>
        <h1 class="text-blue-950 font-extrabold text-2xl mt-4">Contact Us</h1>
        <p class="text-slate-500 text-sm mt-1">We are here to help.</p>
    </div>

    <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-6 text-center">
        <p class="text-red-700 font-bold">In immediate danger?</p>
        <p class="text-slate-600 text-sm mt-1">SafeReport is not an emergency hotline. Call school security or <span class="font-bold text-red-700">911</span> right away.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 text-slate-600 text-sm">
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div>
                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                </div>
                <p class="text-blue-950 font-bold mt-3">Email</p>
                <p class="mt-1">safereport@ccdi.edu.ph</p>
            </div>
            <div>
                <div class="w-12 h-12 mx-auto rounded-full bg-red-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                </div>
                <p class="text-blue-950 font-bold mt-3">Phone</p>
                <p class="mt-1">(02) 123-4567</p>
            </div>
            <div>
                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                </div>
                <p class="text-blue-950 font-bold mt-3">Address</p>
                <p class="mt-1">Sikatuna /street, Old Albay, Legazpi City</p>
            </div>
        </div>

        <div class="border-t border-slate-100 mt-8 pt-6 text-center">
            <p class="text-blue-950 font-bold">Office Hours</p>
            <p class="mt-1">Monday to Friday, 8:00 AM to 5:00 PM</p>
        </div>
    </div>

    <div class="text-center mt-6">
        <a href="{{ url('/') }}" class="text-blue-700 hover:text-blue-900 text-sm font-semibold">&larr; Back to Home</a>
    </div>
</div>

</body>
</html>