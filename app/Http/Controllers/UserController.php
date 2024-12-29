<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $username = $request->user_name;
        $useremail = $request->user_email;
        $userrole = $request->user_role;
        $userpassword = Hash::make($request->user_password);

        // proses
        $storeUser = User::create([
            'name' => $username,
            'email' => $useremail,
            'role' => $userrole,
            'password' => $userpassword
        ]);

        return redirect('/users')->with('success', 'Success store data user');
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $deleteUser = User::where('id', $id)->delete();
        return redirect('/users')->with('success', 'Success delete user');
    }
}
