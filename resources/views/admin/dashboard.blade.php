<x-app-layout>

<div class="min-h-screen bg-gray-100">

    <!-- HERO -->
    <div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white py-16 px-6">

        <div class="max-w-7xl mx-auto">

            <h1 class="text-5xl font-extrabold">
                Dashboard Admin
            </h1>

            <p class="mt-5 text-xl text-slate-300 max-w-2xl">
                Kelola pengguna, buku, dan aktivitas marketplace SiBuku dengan mudah.
            </p>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="max-w-7xl mx-auto px-4 py-10">

        <!-- STATS -->
        <div class="grid md:grid-cols-4 gap-6">

            <!-- Total User -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-slate-500 text-lg">
                    Total User
                </h3>

                <h1 class="text-5xl font-extrabold text-blue-600 mt-4">

                    {{ \App\Models\User::count() }}

                </h1>

            </div>

            <!-- Total Client -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-slate-500 text-lg">
                    Total Client
                </h3>

                <h1 class="text-5xl font-extrabold text-indigo-600 mt-4">

                    {{ \App\Models\User::where('role', 'client')->count() }}

                </h1>

            </div>

            <!-- Total Buku -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-slate-500 text-lg">
                    Total Buku
                </h3>

                <h1 class="text-5xl font-extrabold text-green-600 mt-4">

                    {{ \App\Models\Book::count() }}

                </h1>

            </div>

            <!-- Buku Tersedia -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <h3 class="text-slate-500 text-lg">
                    Buku Tersedia
                </h3>

                <h1 class="text-5xl font-extrabold text-orange-500 mt-4">

                    {{ \App\Models\Book::where('status', 'Tersedia')->count() }}

                </h1>

            </div>

        </div>

        <!-- QUICK ACTION -->
        <div class="mt-10 grid md:grid-cols-3 gap-6">

            <!-- Marketplace -->
            <a href="{{ route('books.index') }}"
               class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">

                <h2 class="text-2xl font-bold text-slate-800">
                    Marketplace
                </h2>

                <p class="mt-3 text-slate-500">
                    Lihat seluruh buku yang tersedia di marketplace.
                </p>

            </a>

            <!-- Tambah Buku -->
            <a href="{{ route('books.create') }}"
               class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">

                <h2 class="text-2xl font-bold text-slate-800">
                    Tambah Buku
                </h2>

                <p class="mt-3 text-slate-500">
                    Upload buku baru ke marketplace.
                </p>

            </a>

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}"
               class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition">

                <h2 class="text-2xl font-bold text-slate-800">
                    Profile
                </h2>

                <p class="mt-3 text-slate-500">
                    Kelola profile admin SiBuku.
                </p>

            </a>

        </div>

        <!-- BUKU TERBARU -->
        <div class="mt-12">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-slate-800">
                    Buku Terbaru
                </h2>

                <a href="{{ route('books.index') }}"
                   class="text-blue-600 font-bold hover:underline">

                    Lihat Semua

                </a>

            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse(\App\Models\Book::latest()->take(4)->get() as $book)

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

                            <a href="{{ route('books.show', $book->id) }}"
                               class="block mt-5 bg-gradient-to-r from-slate-700 to-slate-900 text-white text-center py-3 rounded-2xl font-bold hover:scale-[1.02] transition">

                                Detail Buku

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-3xl shadow-lg p-16 text-center">

                        <h3 class="text-3xl font-bold text-slate-700">
                            Belum Ada Buku
                        </h3>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</x-app-layout>