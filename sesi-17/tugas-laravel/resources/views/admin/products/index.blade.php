<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Produk</h2>
            <a href="{{ route('admin.products.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                + Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider w-10">ID</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-4 py-3 text-right font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50 align-middle">
                                <td class="px-4 py-3 text-gray-500">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}" class="h-12 w-12 object-cover rounded">
                                    @else
                                        <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">
                                            N/A
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 max-w-[160px]">{{ $product->name }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    {{ $product->category->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-gray-500 max-w-[200px] truncate">{{ $product->description }}</td>
                                <td class="px-4 py-3 text-right text-gray-800 whitespace-nowrap">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                        {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap space-x-1">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="inline-flex items-center px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                          class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-8 text-center text-gray-400">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
