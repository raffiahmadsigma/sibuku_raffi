<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * List Client
     */
    public function index()
    {
        // hanya admin
        if (Auth::user()->role != 'admin') {

            abort(403);

        }

        $users = User::where('role', 'client')
            ->latest()
            ->get();

        return view('admin.users', compact('users'));
    }

    /**
     * Hapus Client
     */
    public function destroy(User $user)
    {
        // hanya admin
        if (Auth::user()->role != 'admin') {

            abort(403);

        }

        // tidak bisa hapus admin
        if ($user->role == 'admin') {

            return back();

        }

        $user->delete();

        return back()
            ->with('success', 'Client berhasil dihapus.');
    }
}