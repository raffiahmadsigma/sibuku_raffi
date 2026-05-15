<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-4xl font-extrabold text-slate-800">
                Jual Buku
            </h1>

            <p class="text-slate-500 mt-3 text-lg">
                Upload buku bekasmu dan temukan pembeli dengan mudah.
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
                action="{{ route('books.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8">

                @csrf

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Judul -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul') }}"
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
                            value="{{ old('penulis') }}"
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

                            <option value="">
                                Pilih Jurusan
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

                    </div>

                    <!-- Semester -->
                    <div>

                        <label class="block mb-2 font-bold text-slate-700">
                            Semester
                        </label>

                        <select
                            name="semester"
                            class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                            <option value="">
                                Pilih Semester
                            </option>

                            @for($i = 1; $i <= 8; $i++)

                                <option value="{{ $i }}">
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
                            value="{{ old('harga') }}"
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

                            <option value="Bekas">
                                Bekas
                            </option>

                            <option value="Like New">
                                Like New
                            </option>

                            <option value="Baru">
                                Baru
                            </option>

                        </select>

                    </div>

                </div>

                <!-- Deskripsi -->
                <div class="mt-6">

                    <label class="block mb-2 font-bold text-slate-700">
                        Deskripsi Buku
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="6"
                        placeholder="Masukkan deskripsi buku"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">{{ old('deskripsi') }}</textarea>

                </div>

                <!-- Upload -->
                <div class="mt-6">

                    <label class="block mb-2 font-bold text-slate-700">
                        Upload Foto Buku
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 bg-white">

                </div>

                <!-- BUTTON -->
                <div class="mt-8 flex justify-end gap-4">

                    <a href="{{ route('books.index') }}"
                       class="px-6 py-4 rounded-2xl bg-gray-200 text-slate-700 font-bold hover:bg-gray-300 transition">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold shadow-lg hover:scale-[1.02] transition">

                        Upload Buku

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>