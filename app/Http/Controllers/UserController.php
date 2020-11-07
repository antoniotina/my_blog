<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->paginate(1);

        if (Auth::user()->role != 'admin') {
            return redirect('/');
        }
        
        return view('admin.index', ['users' => $users]);
    }

    public function delete($id)
    {
        $post = User::firstWhere('id', $id);
        $post->delete();
        return redirect('/admin');
    }

    public function viewupdate($id)
    {
        $user = User::firstWhere('id', $id);
        if (!$user || Auth::user()->role != 'admin') {
            return abort(404);
        }
        return view('admin.user', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:2000',
            'email' => 'required|unique:users,email,'.$id,
            'role' => 'required|string|max:255'
        ]);

        $user = User::firstWhere('id', $id);

        if (!$user) {
            return redirect('/admin');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect('/admin');
    }
}
