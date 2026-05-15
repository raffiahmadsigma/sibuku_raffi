<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-8">

            <h1 class="text-4xl font-extrabold text-slate-800 mb-8">

                Checkout Buku

            </h1>

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- FORM -->
                <form
                    action="{{ route('books.processCheckout', $book->id) }}"
                    method="POST"
                    class="space-y-6">

                    @csrf

                    <!-- Nama -->
                    <div>

                        <label class="font-bold text-slate-700">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            required
                            class="w-full mt-2 rounded-2xl border border-gray-300 px-5 py-4">

                    </div>

                    <!-- HP -->
                    <div>

                        <label class="font-bold text-slate-700">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            name="nomor_hp"
                            required
                            class="w-full mt-2 rounded-2xl border border-gray-300 px-5 py-4">

                    </div>

                    <!-- ALAMAT -->
                    <div>

                        <label class="font-bold text-slate-700">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            rows="5"
                            required
                            class="w-full mt-2 rounded-2xl border border-gray-300 px-5 py-4"></textarea>

                    </div>

                    <!-- EKSPEDISI -->
                    <div>

                        <label class="font-bold text-slate-700">
                            Ekspedisi
                        </label>

                        <select
                            name="ekspedisi"
                            required
                            class="w-full mt-2 rounded-2xl border border-gray-300 px-5 py-4">

                            <option value="Fakultas Teknik">
                                Ekspedisi Fakultas Teknik - Rp 15.000
                            </option>

                            <option value="Fakultas Ilmu Komputer">
                                Ekspedisi Fakultas Ilmu Komputer - Rp 20.000
                            </option>

                            <option value="Fakultas Ekonomi dan Bisnis">
                                Ekspedisi Fakultas Ekonomi dan Bisnis - Rp 17.000
                            </option>

                        </select>

                    </div>

                    <!-- PEMBAYARAN -->
                    <div>

                        <label class="font-bold text-slate-700">
                            Metode Pembayaran
                        </label>

                        <select
                            name="metode_pembayaran"
                            required
                            class="w-full mt-2 rounded-2xl border border-gray-300 px-5 py-4">

                            <option value="Transfer Bank">
                                Transfer Bank
                            </option>

                            <option value="E-Wallet">
                                E-Wallet
                            </option>

                            <option value="COD">
                                COD
                            </option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-4 rounded-2xl font-bold text-lg">

                        Bayar Sekarang

                    </button>

                </form>

                <!-- DETAIL -->
                <div class="bg-gray-50 rounded-3xl p-8">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6">
                        Detail Pembayaran
                    </h2>

                    <div class="space-y-4">

                        <div class="flex justify-between">

                            <span>Harga Buku</span>

                            <span class="font-bold">
                                Rp {{ number_format($book->harga) }}
                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span>Biaya Admin</span>

                            <span class="font-bold">
                                Rp 2.000
                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span>Ongkir</span>

                            <span class="font-bold">
                                Menyesuaikan ekspedisi
                            </span>

                        </div>

                        <hr>

                        <div class="flex justify-between text-2xl font-extrabold text-blue-600">

                            <span>Total</span>

                            <span>
                                Rp {{ number_format($book->harga + 2000) }}+
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>