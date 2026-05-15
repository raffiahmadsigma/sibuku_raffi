<x-guest-layout>

<div class="min-h-screen bg-gradient-to-br from-blue-700 via-indigo-800 to-slate-900 flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl">

        <!-- LEFT -->
        <div class="hidden lg:flex flex-col justify-center p-16 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">

            <h1 class="text-6xl font-extrabold leading-tight">
                SiBuku
            </h1>

            <p class="mt-6 text-xl leading-relaxed text-blue-100">
                Marketplace buku bekas mahasiswa untuk jual beli buku berdasarkan jurusan dan semester.
            </p>

            <div class="mt-10 space-y-5">

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Jual buku dengan mudah</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Cari buku berdasarkan jurusan</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-4 h-4 bg-white rounded-full"></div>
                    <p class="text-lg">Chat langsung dengan penjual</p>
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center p-6 sm:p-10 lg:p-16">

            <div class="w-full max-w-md">

                <div class="text-center">

                    <h2 class="text-4xl font-bold text-slate-800">
                        Login
                    </h2>

                    <p class="mt-3 text-slate-500">
                        Selamat datang kembali di SiBuku
                    </p>

                </div>

                <!-- Success Message -->
                @if(session('success'))

                    <div class="mt-6 mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl">

                        {{ session('success') }}

                    </div>

                @endif

                <form method="POST"
                      action="{{ route('login') }}"
                      class="mt-10">

                    @csrf

                    <!-- Email -->
                    <div>

                        <label class="block mb-2 font-semibold text-slate-700">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            autofocus
                            placeholder="Masukkan email"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

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
                                class="w-full rounded-2xl border border-slate-300 px-5 py-4 pr-14 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                                👁️

                            </button>

                        </div>

                    </div>

                    <!-- Remember -->
                    <div class="flex items-center justify-between mt-5">

                        <label class="flex items-center gap-2 text-slate-600">
                            <input type="checkbox" name="remember" class="rounded">
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-blue-600 hover:underline text-sm">

                                Lupa password?

                            </a>
                        @endif

                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full mt-8 bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-4 rounded-2xl font-bold text-lg hover:scale-[1.02] transition duration-300 shadow-lg">

                        Login

                    </button>

                    <!-- Register -->
                    <p class="text-center text-slate-600 mt-6">

                        Belum punya akun?

                        <a href="{{ route('register') }}"
                           class="text-blue-600 font-semibold hover:underline">

                            Register

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

</script>

</x-guest-layout>