<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}! 👋</p>
                    <p class="mt-1 text-gray-500 text-sm">Berikut ringkasan data toko Anda saat ini.</p>
                </div>
            </div>

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                {{-- Total Produk --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Jumlah Produk</p>
                        <p class="text-3xl font-bold text-gray-900 mt-0.5">{{ $totalProducts }}</p>
                        <a href="{{ route('admin.products.index') }}"
                           class="text-xs text-indigo-600 hover:underline mt-1 inline-block">Lihat semua →</a>
                    </div>
                </div>

                {{-- Total Kategori --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-emerald-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Jumlah Kategori Produk</p>
                        <p class="text-3xl font-bold text-gray-900 mt-0.5">{{ $totalCategories }}</p>
                        <a href="{{ route('admin.categories.index') }}"
                           class="text-xs text-emerald-600 hover:underline mt-1 inline-block">Lihat semua →</a>
                    </div>
                </div>

                {{-- Total Klik Produk --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-14 h-14 bg-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Jumlah Klik Produk</p>
                        <p class="text-3xl font-bold text-gray-900 mt-0.5">{{ number_format($totalClicks) }}</p>
                        <p class="text-xs text-gray-400 mt-1">Total kunjungan halaman produk</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
