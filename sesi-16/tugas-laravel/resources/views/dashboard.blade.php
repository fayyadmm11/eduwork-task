<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}! 👋</p>
                    <p class="mt-1 text-gray-600">Anda berhasil login ke <strong>Toko Fayyad</strong>.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <div class="text-4xl mb-2">🛍️</div>
                    <h3 class="font-semibold text-gray-700">Katalog Produk</h3>
                    <p class="text-sm text-gray-500 mt-1">Jelajahi semua produk tersedia</p>
                    <a href="/products" class="mt-4 inline-block text-sm text-indigo-600 hover:underline">Lihat Katalog →</a>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <div class="text-4xl mb-2">🛒</div>
                    <h3 class="font-semibold text-gray-700">Keranjang</h3>
                    <p class="text-sm text-gray-500 mt-1">Lihat produk yang ingin dibeli</p>
                    <a href="/cart" class="mt-4 inline-block text-sm text-indigo-600 hover:underline">Lihat Keranjang →</a>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <div class="text-4xl mb-2">👤</div>
                    <h3 class="font-semibold text-gray-700">Profil Saya</h3>
                    <p class="text-sm text-gray-500 mt-1">Ubah nama, email, atau password</p>
                    <a href="{{ route('profile.edit') }}" class="mt-4 inline-block text-sm text-indigo-600 hover:underline">Edit Profil →</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
