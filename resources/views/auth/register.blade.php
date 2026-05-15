<x-guest-layout>

<div class="min-h-screen bg-gradient-to-br from-indigo-700 via-blue-700 to-slate-900 flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl">

        <!-- LEFT -->
        <div class="hidden lg:flex flex-col justify-center p-16 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">

            <h1 class="text-6xl font-extrabold leading-tight">
                SiBuku
            </h1>

            <p class="mt-6 text-xl leading-relaxed text-blue-100">
                Temukan buku bekas mahasiswa terbaik dengan harga terjangkau.
            </p>

            <div class="mt-10 space-y-5">

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Marketplace buku mahasiswa</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Filter jurusan & semester</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Jual beli buku lebih mudah</p>
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center p-6 sm:p-10 lg:p-16">

            <div class="w-full max-w-md">

                <div class="text-center">

                    <h2 class="text-4xl font-bold text-slate-800">
                        Register
                    </h2>

                    <p class="mt-3 text-slate-500">
                        Buat akun baru SiBuku
                    </p>

                </div>

                <!-- Error Validation -->
                @if ($errors->any())

                    <div class="mt-6 mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-2xl">

                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <form method="POST"
                      action="{{ route('register') }}"
                      class="mt-10">

                    @csrf

                    <!-- Nama -->
                    <div>

                        <label class="block mb-2 font-semibold text-slate-700">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    <!-- Email -->
                    <div class="mt-6">

                        <label class="block mb-2 font-semibold text-slate-700">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Masukkan email"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    <!-- Password -->
                    <div class="mt-6">

                        <label class="block mb-2 font-semibold text-slate-700">
                            Password
                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                placeholder="Masukkan password"
                                class="w-full rounded-2xl border border-slate-300 px-5 py-4 pr-14 focus:ring-2 focus:ring-blue-500 outline-none">

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                👁️

                            </button>

                        </div>

                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-6">

                        <label class="block mb-2 font-semibold text-slate-700">
                            Konfirmasi Password
                        </label>

                        <div class="relative">

                            <input
                                id="confirm_password"
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Konfirmasi password"
                                class="w-full rounded-2xl border border-slate-300 px-5 py-4 pr-14 focus:ring-2 focus:ring-blue-500 outline-none">

                            <button
                                type="button"
                                onclick="toggleConfirmPassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                👁️

                            </button>

                        </div>

                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full mt-8 bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-4 rounded-2xl font-bold text-lg hover:scale-[1.02] transition duration-300 shadow-lg">

                        Register

                    </button>

                    <!-- Login -->
                    <p class="text-center text-slate-600 mt-6">

                        Sudah punya akun?

                        <a href="{{ route('login') }}"
                           class="text-blue-600 font-semibold hover:underline">

                            Login

                        </a>

                    </p>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

    function togglePassword() {

        const password = document.getElementById('password');

        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }

    }

    function toggleConfirmPassword() {

        const password = document.getElementById('confirm_password');

        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }

    }

</script>

</x-guest-layout>