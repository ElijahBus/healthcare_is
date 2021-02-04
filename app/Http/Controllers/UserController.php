<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return view('settings')->with(['alert' => "New user created", 'alertStatus' => 'success', 'title' => 'Settings']);
    }

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // if ($user->password != Hash::make($request->old_password))
        //     return view('settings')->with(['alert' => "Password don't match", 'alertStatus' => 'danger']);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return view('settings')->with(['alert' => "Password successfully changed", 'alertStatus' => 'success', 'title' => 'Settings']);
    }
}
