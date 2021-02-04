<?php

namespace App\Http\Controllers;

use App\Message;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $dates = [];
        $allPatients = [];
        $newPatients = [];
        $recoveredPatients = [];

        $patients = DB::table('patients')
            ->select('created_at')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy(function ($date){
                return Carbon::parse($date->created_at)->format('Y-m-d');
            });

            foreach($patients as $date => $value) {
                array_push($dates, $date);

                $all = DB::table('patients')
                    ->select('created_at')
                    ->orderBy('id', 'desc')
                    ->whereDate('created_at', '<=', $date)
                    ->count();
                array_push($allPatients, $all);

                $new = DB::table('patients')
                    ->select('created_at')
                    ->orderBy('id', 'desc')
                    ->whereDate('created_at', '=', $date)
                    ->count();
                array_push($newPatients, $new);

                $recovered = DB::table('patients')
                    ->select('created_at')
                    ->orderBy('id', 'desc')
                    ->whereDate('created_at', '<=', $date)
                    ->where('is_recovered', '=', true)
                    ->count();
                array_push($recoveredPatients, $recovered);
                }

                $unreadMessage = Message::where('is_read', false)->limit(3)->get();
            // dd($dates, $allPatients, $newPatients, $recoveredPatients);

            return view('analytics', compact('unreadMessage'))->with([
            'chartsData' => [$dates, $allPatients, $newPatients, $recoveredPatients],
            'title' => 'Analytics'
            ]);
    }
}
