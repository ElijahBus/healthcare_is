<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of resource
     *
     */
    public function index()
    {
        $unreadMessage = Message::where('is_read', false)->limit(3)->get();
        return view('settings', compact('unreadMessage'))->with([
            'users' => User::all(),
            'title' => 'Settings'
        ]);
    }
}
