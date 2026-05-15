<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-4xl font-extrabold text-slate-800">
                Edit Buku
            </h1>

            <p class="text-slate-500 mt-3 text-lg">
                Perbarui informasi buku yang ingin dijual.
            </p>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-6 py-4 rounded-2xl">

                <ul class="list-disc list-inside">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <form
                action="{{ route('books.update', $book->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8">

                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Judul -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul', $book->judul) }}"
                            placeholder="Masukkan judul buku"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    <!-- Penulis -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Penulis
                        </label>

                        <input
                            type="text"
                            name="penulis"
                            value="{{ old('penulis', $book->penulis) }}"
                            placeholder="Masukkan nama penulis"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    <!-- Jurusan -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Jurusan
                        </label>

                        <select
                            name="jurusan"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                            <option value="Informatika"
                                {{ $book->jurusan == 'Informatika' ? 'selected' : '' }}>
                                Informatika
                            </option>

                            <option value="Manajemen"
                                {{ $book->jurusan == 'Manajemen' ? 'selected' : '' }}>
                                Manajemen
                            </option>

                            <option value="Akuntansi"
                                {{ $book->jurusan == 'Akuntansi' ? 'selected' : '' }}>
                                Akuntansi
                            </option>

                        </select>

                    </div>

                    <!-- Semester -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Semester
                        </label>

                        <select
                            name="semester"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                            @for($i = 1; $i <= 8; $i++)

                                <option
                                    value="{{ $i }}"
                                    {{ $book->semester == $i ? 'selected' : '' }}>

                                    Semester {{ $i }}

                                </option>

                            @endfor

                        </select>

                    </div>

                    <!-- Harga -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="harga"
                            value="{{ old('harga', $book->harga) }}"
                            placeholder="Masukkan harga"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    <!-- Kondisi -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Kondisi Buku
                        </label>

                        <select
                            name="kondisi"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                            <option value="Bekas"
                                {{ $book->kondisi == 'Bekas' ? 'selected' : '' }}>
                                Bekas
                            </option>

                            <option value="Like New"
                                {{ $book->kondisi == 'Like New' ? 'selected' : '' }}>
                                Like New
                            </option>

                            <option value="Baru"
                                {{ $book->kondisi == 'Baru' ? 'selected' : '' }}>
                                Baru
                            </option>

                        </select>

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div class="mt-6">

                    <label class="block mb-2 font-bold text-slate-700">
                        Deskripsi Buku
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="6"
                        placeholder="Masukkan deskripsi buku"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">{{ old('deskripsi', $book->deskripsi) }}</textarea>

                </div>

                <!-- FOTO LAMA -->
                @if($book->foto)

                    <div class="mt-6">

                        <label class="block mb-3 font-bold text-slate-700">
                            Foto Saat Ini
                        </label>

                        <img
                            src="{{ asset('storage/' . $book->foto) }}"
                            class="w-64 rounded-2xl shadow-lg">

                    </div>

                @endif

                <!-- FOTO BARU -->
                <div class="mt-6">

                    <label class="block mb-2 font-bold text-slate-700">
                        Upload Foto Baru
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 bg-white">

                </div>

                <!-- BUTTON -->
                <div class="mt-8 flex justify-end gap-4">

                    <a href="{{ route('books.show', $book->id) }}"
                       class="px-6 py-4 rounded-2xl bg-gray-200 text-slate-700 font-bold hover:bg-gray-300 transition">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                        Update Buku

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>