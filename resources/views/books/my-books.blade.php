<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">

            <div>

                <h1 class="text-4xl font-extrabold text-slate-800">
                    Buku Saya
                </h1>

                <p class="text-slate-500 mt-2">
                    Kelola semua buku yang kamu jual di SiBuku.
                </p>

            </div>

            <a href="{{ route('books.create') }}"
               class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-4 rounded-2xl font-bold shadow-lg hover:scale-[1.02] transition">

                + Tambah Buku

            </a>

        </div>

        <!-- SUCCESS -->
        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">

                {{ session('success') }}

            </div>

        @endif

        <!-- GRID -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @forelse($books as $book)

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

                    <!-- IMAGE -->
                    <div class="h-64 overflow-hidden">

                        @if($book->foto)

                            <img
                                src="{{ asset('storage/' . $book->foto) }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-300">

                        @else

                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">

                                Tidak ada gambar

                            </div>

                        @endif

                    </div>

                    <!-- BODY -->
                    <div class="p-5">

                        <h3 class="text-xl font-bold text-slate-800 line-clamp-2">
                            {{ $book->judul }}
                        </h3>

                        <p class="text-slate-500 mt-2">
                            {{ $book->penulis }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-4">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                {{ $book->jurusan }}
                            </span>

                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">
                                Semester {{ $book->semester }}
                            </span>

                        </div>

                        <div class="mt-5">

                            <h4 class="text-2xl font-extrabold text-blue-600">
                                Rp {{ number_format($book->harga) }}
                            </h4>

                        </div>

                        <!-- BUTTON -->
                        <div class="grid grid-cols-2 gap-3 mt-5">

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="text-center bg-yellow-400 text-white py-3 rounded-2xl font-bold hover:scale-[1.02] transition">

                                Edit

                            </a>

                            <form
                                action="{{ route('books.destroy', $book->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full bg-red-500 text-white py-3 rounded-2xl font-bold hover:scale-[1.02] transition">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl shadow-lg p-16 text-center">

                    <h3 class="text-3xl font-bold text-slate-700">
                        Belum Ada Buku
                    </h3>

                    <p class="text-slate-500 mt-4">
                        Kamu belum menjual buku apapun.
                    </p>

                    <a href="{{ route('books.create') }}"
                       class="inline-block mt-6 bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-8 py-4 rounded-2xl font-bold">

                        Upload Buku

                    </a>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>