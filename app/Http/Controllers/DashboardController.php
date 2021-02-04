<?php

namespace App\Http\Controllers;

use App\Message;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of resource
     *
     */
    public function index()
    {
        $patients = Patient::all()->count();
        $newPatients = Patient::whereDate('created_at', Carbon::today()->format('Y-m-d'))->get()->count();
        $recoveredPatients = Patient::where('is_recovered', true)->get()->count();

        $lastRegistered = Patient::orderBy('id', 'desc')->limit(5)->get();
        $lastRecoverd = Patient::where('is_recovered', true)->orderBy('id','desc')->get();

        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();

        return view('dashboard')->with([
            'allPatients' => $patients,
            'newPatients' => $newPatients,
            'recoveredPatients' => $recoveredPatients,
            'lastRegisteredPatients' => $lastRegistered,
            'lastRecovered' => $lastRecoverd,
            'unreadMessage' => $unreadNotifications,
            'title' => 'Dashboard'
        ]);
    }
}
