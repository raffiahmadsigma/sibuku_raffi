<nav x-data="{ open: false }"
     class="bg-white shadow-md border-b border-gray-100 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">

            <!-- LEFT -->
            <div class="flex items-center gap-10">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3">

                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-700 flex items-center justify-center text-white font-extrabold text-xl shadow-lg">

                        S

                    </div>

                    <div>

                        <h1 class="text-2xl font-extrabold text-slate-800">
                            SiBuku
                        </h1>

                        <p class="text-xs text-slate-500 -mt-1">
                            Marketplace Buku Mahasiswa
                        </p>

                    </div>

                </a>

                <!-- MENU -->
                <div class="hidden md:flex items-center gap-6">

                    <!-- ADMIN -->
                    @if(Auth::user()->role == 'admin')

                        <a href="{{ route('dashboard') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Dashboard

                        </a>

                        <a href="{{ route('admin.users') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Client

                        </a>

                    <!-- CLIENT -->
                    @else

                        <a href="{{ route('dashboard') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Dashboard

                        </a>

                        <a href="{{ route('books.index') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Marketplace

                        </a>

                        <a href="{{ route('books.my') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Buku Saya

                        </a>

                        <a href="{{ route('books.create') }}"
                           class="font-semibold text-slate-700 hover:text-blue-600 transition">

                            Jual Buku

                        </a>

                    @endif

                </div>

            </div>

            <!-- RIGHT -->
            <div class="hidden md:flex items-center gap-5">

                <!-- USER -->
                <div class="text-right">

                    <h2 class="font-bold text-slate-800">
                        {{ Auth::user()->name }}
                    </h2>

                    <p class="text-sm text-slate-500">

                        {{ Auth::user()->role }}

                    </p>

                </div>

                <!-- DROPDOWN -->
                <div x-data="{ dropdownOpen: false }"
                     class="relative">

                    <button
                        @click="dropdownOpen = !dropdownOpen"
                        class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold shadow-lg">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </button>

                    <!-- MENU -->
                    <div
                        x-show="dropdownOpen"
                        @click.away="dropdownOpen = false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl border overflow-hidden">

                        <a href="{{ route('profile.edit') }}"
                           class="block px-5 py-4 hover:bg-gray-100 font-semibold text-slate-700">

                            Profile

                        </a>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="w-full text-left px-5 py-4 hover:bg-red-50 text-red-600 font-semibold">

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="flex md:hidden items-center">

                <button
                    @click="open = ! open"
                    class="p-3 rounded-xl bg-gray-100">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div x-show="open"
         x-transition
         class="md:hidden bg-white border-t border-gray-100">

        <div class="px-4 py-4 space-y-3">

            <!-- ADMIN -->
            @if(Auth::user()->role == 'admin')

                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Dashboard

                </a>

                <a href="{{ route('admin.users') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Client

                </a>

            <!-- CLIENT -->
            @else

                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Dashboard

                </a>

                <a href="{{ route('books.index') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Marketplace

                </a>

                <a href="{{ route('books.my') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Buku Saya

                </a>

                <a href="{{ route('books.create') }}"
                   class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                    Jual Buku

                </a>

            @endif

            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-3 rounded-2xl hover:bg-gray-100 font-semibold">

                Profile

            </a>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full text-left px-4 py-3 rounded-2xl hover:bg-red-50 text-red-600 font-semibold">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>