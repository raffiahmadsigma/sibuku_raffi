<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Marketplace Buku
     */
    public function index(Request $request)
    {
        $books = Book::query();

        // SEARCH
        if ($request->search) {

            $books->where(function ($query) use ($request) {

                $query->where('judul', 'like', '%' . $request->search . '%')
                      ->orWhere('penulis', 'like', '%' . $request->search . '%');

            });

        }

        // FILTER JURUSAN
        if ($request->jurusan) {

            $books->where('jurusan', $request->jurusan);

        }

        // FILTER SEMESTER
        if ($request->semester) {

            $books->where('semester', $request->semester);

        }

        $books = $books->latest()->get();

        return view('books.index', compact('books'));
    }

    /**
     * Buku Saya
     */
    public function myBooks()
    {
        $books = Book::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('books.my-books', compact('books'));
    }

    /**
     * Form Jual Buku
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Simpan Buku
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'penulis' => 'required',

            'jurusan' => 'required',

            'semester' => 'required',

            'harga' => 'required|numeric',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $foto = null;

        // Upload Foto
        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('books', 'public');

        }

        // Simpan Buku
        Book::create([

            'user_id' => Auth::id(),

            'judul' => $request->judul,

            'penulis' => $request->penulis,

            'jurusan' => $request->jurusan,

            'semester' => $request->semester,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'foto' => $foto,

            'kondisi' => $request->kondisi ?? 'Bekas',

            'status' => 'Tersedia',

        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Detail Buku
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Form Edit Buku
     */
    public function edit(Book $book)
    {
        // hanya pemilik buku
        if (Auth::id() != $book->user_id) {

            abort(403);

        }

        return view('books.edit', compact('book'));
    }

    /**
     * Update Buku
     */
    public function update(Request $request, Book $book)
    {
        // hanya pemilik buku
        if (Auth::id() != $book->user_id) {

            abort(403);

        }

        $request->validate([

            'judul' => 'required',

            'penulis' => 'required',

            'jurusan' => 'required',

            'semester' => 'required',

            'harga' => 'required|numeric',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $foto = $book->foto;

        // Upload foto baru
        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('books', 'public');

        }

        $book->update([

            'judul' => $request->judul,

            'penulis' => $request->penulis,

            'jurusan' => $request->jurusan,

            'semester' => $request->semester,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'foto' => $foto,

            'kondisi' => $request->kondisi,

        ]);

        return redirect()
            ->route('books.show', $book->id)
            ->with('success', 'Buku berhasil diupdate.');
    }

    /**
     * Checkout Buku
     */
    public function checkout(Book $book)
    {
        // tidak bisa beli buku sendiri
        if (Auth::id() == $book->user_id) {

            return back()
                ->with('error', 'Kamu tidak bisa membeli buku sendiri.');

        }

        // buku sudah terjual
        if ($book->status == 'Terjual') {

            return back()
                ->with('error', 'Buku sudah terjual.');

        }

        return view('books.checkout', compact('book'));
    }

    /**
     * Proses Checkout
     */
    public function processCheckout(Request $request, Book $book)
    {
        $request->validate([

            'nama' => 'required',

            'nomor_hp' => 'required',

            'alamat' => 'required',

            'ekspedisi' => 'required',

            'metode_pembayaran' => 'required',

        ]);

        // ongkir
        $ongkir = 0;

        if ($request->ekspedisi == 'Fakultas Teknik') {

            $ongkir = 15000;

        } elseif ($request->ekspedisi == 'Fakultas Ilmu Komputer') {

            $ongkir = 20000;

        } elseif ($request->ekspedisi == 'Fakultas Ekonomi dan Bisnis') {

            $ongkir = 17000;

        }

        // biaya admin
        $biayaAdmin = 2000;

        // total
        $total = $book->harga + $ongkir + $biayaAdmin;

        // simpan order
        Order::create([

            'user_id' => Auth::id(),

            'book_id' => $book->id,

            'nama' => $request->nama,

            'nomor_hp' => $request->nomor_hp,

            'alamat' => $request->alamat,

            'ekspedisi' => $request->ekspedisi,

            'ongkir' => $ongkir,

            'metode_pembayaran' => $request->metode_pembayaran,

            'harga_buku' => $book->harga,

            'total_harga' => $total,

            'status' => 'Menunggu Pembayaran',

        ]);

        // update status buku
        $book->update([

            'status' => 'Terjual'

        ]);

        return redirect()
            ->route('books.show', $book->id)
            ->with('success', 'Checkout berhasil.');
    }

    /**
     * Beli Buku
     */
    public function buy(Book $book)
    {
        // tidak bisa beli buku sendiri
        if (Auth::id() == $book->user_id) {

            return back()
                ->with('error', 'Kamu tidak bisa membeli buku sendiri.');

        }

        // jika buku sudah terjual
        if ($book->status == 'Terjual') {

            return back()
                ->with('error', 'Buku sudah terjual.');

        }

        // update status buku
        $book->update([

            'status' => 'Terjual'

        ]);

        return redirect()
            ->route('books.show', $book->id)
            ->with('success', 'Buku berhasil dibeli.');
    }

    /**
     * Hapus Buku
     */
    public function destroy(Book $book)
    {
        // hanya pemilik buku
        if (Auth::id() != $book->user_id) {

            abort(403);

        }

        // hapus foto jika ada
        if ($book->foto && file_exists(public_path('storage/' . $book->foto))) {

            unlink(public_path('storage/' . $book->foto));

        }

        // hapus buku
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}