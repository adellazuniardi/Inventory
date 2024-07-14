<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        $users = User::paginate(10);
        return view('user', compact('users'));
    }

    public function destroy(User $user)
    {
        // Prevent an admin from deleting their own account
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return back()->with('success', 'User has been deleted successfully.');
    }

    public function makeAdmin(User $user)
    {
        // Change the user's role to 'admin'
        $user->role = 'admin';
        $user->save();
        return back()->with('success', 'User has been promoted to admin successfully.');
    }

    public function demoteAdmin(User $user)
    {
        // Change the user's role back to 'karyawan'
        $user->role = 'karyawan';
        $user->save();
        return back()->with('success', 'Admin has been demoted to karyawan successfully.');
    }
}
