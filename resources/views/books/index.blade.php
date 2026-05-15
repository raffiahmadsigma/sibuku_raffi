<x-app-layout>

<div class="min-h-screen bg-gray-100">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-12 px-6">

        <div class="max-w-7xl mx-auto">

            <h1 class="text-4xl lg:text-5xl font-extrabold">
                Marketplace SiBuku
            </h1>

            <p class="mt-4 text-blue-100 text-lg">
                Temukan buku bekas mahasiswa terbaik berdasarkan jurusan dan semester.
            </p>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="max-w-7xl mx-auto px-4 py-8">

        <!-- FILTER -->
        <div class="bg-white rounded-3xl shadow-lg p-6 mb-8">

            <form method="GET"
                  class="grid md:grid-cols-4 gap-4">

                <!-- Search -->
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari judul buku..."
                    class="rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                <!-- Jurusan -->
                <select
                    name="jurusan"
                    class="rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    <option value="">
                        Semua Jurusan
                    </option>

                    <option value="Informatika">
                        Informatika
                    </option>

                    <option value="Manajemen">
                        Manajemen
                    </option>

                    <option value="Akuntansi">
                        Akuntansi
                    </option>

                </select>

                <!-- Semester -->
                <select
                    name="semester"
                    class="rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    <option value="">
                        Semua Semester
                    </option>

                    @for($i = 1; $i <= 8; $i++)

                        <option value="{{ $i }}">
                            Semester {{ $i }}
                        </option>

                    @endfor

                </select>

                <!-- Button -->
                <button
                    class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl font-bold hover:scale-[1.02] transition">

                    Cari Buku

                </button>

            </form>

        </div>

        <!-- ACTION -->
        <div class="flex justify-between items-center mb-8">

            <h2 class="text-2xl font-bold text-slate-800">
                Daftar Buku
            </h2>

            <a href="{{ route('books.create') }}"
               class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:scale-[1.02] transition">

                + Jual Buku

            </a>

        </div>

        <!-- BOOK GRID -->
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

                        <div class="mt-5 flex justify-between items-center">

                            <h4 class="text-2xl font-extrabold text-blue-600">
                                Rp {{ number_format($book->harga) }}
                            </h4>

                        </div>

                        <!-- BUTTON -->
                        <a href="{{ route('books.show', $book->id) }}"
                           class="block mt-5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center py-3 rounded-2xl font-bold hover:scale-[1.02] transition">

                            Detail Buku

                        </a>

                    </div>

                </div>

            @empty

                <!-- EMPTY -->
                <div class="col-span-full bg-white rounded-3xl shadow-lg p-16 text-center">

                    <h3 class="text-3xl font-bold text-slate-700">
                        Belum Ada Buku
                    </h3>

                    <p class="text-slate-500 mt-4">
                        Jadilah orang pertama yang menjual buku di SiBuku.
                    </p>

                    <a href="{{ route('books.create') }}"
                       class="inline-block mt-6 bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-8 py-4 rounded-2xl font-bold">

                        Jual Buku Sekarang

                    </a>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>