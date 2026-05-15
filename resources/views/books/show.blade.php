<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- SUCCESS -->
        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">

                {{ session('success') }}

            </div>

        @endif

        <!-- ERROR -->
        @if(session('error'))

            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-6 py-4 rounded-2xl">

                {{ session('error') }}

            </div>

        @endif

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="grid lg:grid-cols-2 gap-10 p-8">

                <!-- IMAGE -->
                <div>

                    @if($book->foto)

                        <img
                            src="{{ asset('storage/' . $book->foto) }}"
                            class="w-full h-[500px] object-cover rounded-3xl shadow-lg">

                    @else

                        <div class="w-full h-[500px] bg-gray-200 rounded-3xl flex items-center justify-center text-gray-400 text-xl">

                            Tidak ada gambar

                        </div>

                    @endif

                </div>

                <!-- DETAIL -->
                <div class="flex flex-col justify-between">

                    <div>

                        <!-- TITLE -->
                        <h1 class="text-4xl font-extrabold text-slate-800 leading-tight">

                            {{ $book->judul }}

                        </h1>

                        <!-- PENULIS -->
                        <p class="mt-4 text-xl text-slate-500">

                            Penulis:
                            <span class="font-semibold text-slate-700">
                                {{ $book->penulis }}
                            </span>

                        </p>

                        <!-- BADGE -->
                        <div class="flex flex-wrap gap-3 mt-6">

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
                                {{ $book->jurusan }}
                            </span>

                            <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full font-semibold">
                                Semester {{ $book->semester }}
                            </span>

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">
                                {{ $book->kondisi }}
                            </span>

                            <!-- STATUS -->
                            <span class="
                                px-4 py-2 rounded-full font-semibold
                                {{ $book->status == 'Tersedia'
                                    ? 'bg-blue-100 text-blue-700'
                                    : 'bg-red-100 text-red-700' }}">

                                {{ $book->status }}

                            </span>

                        </div>

                        <!-- PRICE -->
                        <div class="mt-8">

                            <h2 class="text-5xl font-extrabold text-blue-600">

                                Rp {{ number_format($book->harga) }}

                            </h2>

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="mt-10">

                            <h3 class="text-2xl font-bold text-slate-800 mb-4">
                                Deskripsi Buku
                            </h3>

                            <div class="bg-gray-50 rounded-2xl p-6 text-slate-600 leading-relaxed">

                                {{ $book->deskripsi ?: 'Tidak ada deskripsi.' }}

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-10 flex flex-wrap gap-4">

                        <!-- BACK -->
                        <a href="{{ route('books.index') }}"
                           class="px-8 py-4 rounded-2xl bg-gray-200 text-slate-700 font-bold hover:bg-gray-300 transition">

                            Kembali

                        </a>

                        <!-- JIKA PEMILIK -->
                        @if(Auth::id() == $book->user_id)

                            <!-- EDIT -->
                            <a href="{{ route('books.edit', $book->id) }}"
                               class="px-8 py-4 rounded-2xl bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                                Edit Buku

                            </a>

                            <!-- DELETE -->
                            <form
                                action="{{ route('books.destroy', $book->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-red-500 to-red-700 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                                    Hapus Buku

                                </button>

                            </form>

                        @else

                            <!-- CHAT -->
                            <button
                                class="px-8 py-4 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                                Chat Penjual

                            </button>

                            <!-- CHECKOUT -->
                            @if($book->status == 'Tersedia')

                                <form
                                    action="{{ route('books.checkout', $book->id) }}"
                                    method="GET">

                                    <button
                                        type="submit"
                                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                                        Beli Buku

                                    </button>

                                </form>

                            @else

                                <button
                                    disabled
                                    class="px-8 py-4 rounded-2xl bg-gray-300 text-gray-600 font-bold cursor-not-allowed">

                                    Buku Sudah Terjual

                                </button>

                            @endif

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>