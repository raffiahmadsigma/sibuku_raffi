<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- TITLE -->
        <div class="mb-8">

            <h1 class="text-4xl font-extrabold text-slate-800">
                Data Client
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola semua akun client SiBuku
            </p>

        </div>

        <!-- SUCCESS -->
        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">

                {{ session('success') }}

            </div>

        @endif

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="px-6 py-5 text-left">
                                Nama
                            </th>

                            <th class="px-6 py-5 text-left">
                                Email
                            </th>

                            <th class="px-6 py-5 text-left">
                                Role
                            </th>

                            <th class="px-6 py-5 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr class="border-t">

                                <td class="px-6 py-5 font-semibold">

                                    {{ $user->name }}

                                </td>

                                <td class="px-6 py-5 text-slate-600">

                                    {{ $user->email }}

                                </td>

                                <td class="px-6 py-5">

                                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-bold">

                                        {{ $user->role }}

                                    </span>

                                </td>

                                <td class="px-6 py-5 text-center">

                                    <form
                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus client ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-5 py-3 rounded-2xl bg-gradient-to-r from-red-500 to-red-700 text-white font-bold">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center py-10 text-slate-500">

                                    Belum ada client.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>