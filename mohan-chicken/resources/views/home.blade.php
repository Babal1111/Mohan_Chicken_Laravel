@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-red-700 mb-4">🍗 Mohan Chicken 🍗</h1>
        <p class="text-lg md:text-xl text-gray-700 mb-6">
            Welcome to <span class="font-semibold text-red-500">Mohan Chicken</span> –<br>
            Savor the authentic taste of India, right here in your city!
        </p>
        <div class="flex flex-col md:flex-row justify-center gap-4 mb-8">
            <a href="{{ url('/menu-items') }}" class="px-6 py-3 rounded-lg bg-red-500 text-white font-semibold shadow hover:bg-red-600 transition">View Menu</a>
            <a href="{{ url('/reservations/create') }}" class="px-6 py-3 rounded-lg bg-green-500 text-white font-semibold shadow hover:bg-green-600 transition">Book a Table</a>
            <a href="{{ url('/orders/create') }}" class="px-6 py-3 rounded-lg bg-blue-500 text-white font-semibold shadow hover:bg-blue-600 transition">Order Online</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h4 class="text-lg font-bold text-red-600 mb-2">Our Specialties</h4>
            <ul class="text-gray-700 space-y-1">
                <li>🔥 Tandoori Chicken</li>
                <li>🍛 Butter Chicken</li>
                <li>🥘 Chicken Biryani</li>
                <li>🍢 Kebabs & more!</li>
            </ul>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h4 class="text-lg font-bold text-green-600 mb-2">Opening Hours</h4>
            <p class="text-gray-700">
                Mon-Sun: <span class="font-semibold">11:00 AM - 11:00 PM</span><br>
                <span class="text-sm text-gray-500">(Open all days)</span>
            </p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h4 class="text-lg font-bold text-blue-600 mb-2">Contact Us</h4>
            <p class="text-gray-700">
                📞 <span class="font-semibold">+91-8675-131313</span><br>
                📍 Sdara Bazar, Near SBI Bank,<br> Jalandhar Cantt, 144005<br>
                <a href="mailto:info@mohanchicken.com" class="text-blue-500 underline">info@mohanchicken.com</a>
            </p>
        </div>
    </div>
</div>
@endsection
