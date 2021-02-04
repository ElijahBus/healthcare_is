<?php

namespace App\Http\Controllers;

use App\Message;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();

        return view('allpatients')->with([
            'patients' => $patients,
            'unreadMessage' => $unreadNotifications,
            'title' => 'All patients'
        ]);
    }

    public function latest()
    {
        $patient = Patient::with('records')->orderBy('id', 'desc')->first();
        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();

        $allergies = null;
        $chargesComments = null;
        $labResult = null;

        foreach ($patient->records as $record) {
            $allergies = $record->allergies;
            $chargesComments = $record->charges_comments;
            $labResult = $record->lab_result;
        }

        return view('patient_info')->with([
            'patient' => $patient,
            'unreadMessage' => $unreadNotifications,
            'title' => 'Patient Information',
            'allergies' => $allergies,
            'labResult' => $labResult,
            'chargesComments' => $chargesComments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();
        return view('add_patient')->with([
                'unreadMessage' => $unreadNotifications,
                'title' => 'New Patient'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPatient = Patient::create($request->all());

        return redirect('/patient/latest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();

        $allergies = null;
        $chargesComments = null;
        $labResult = null;

        foreach ($patient->records as $record) {
            $allergies = $record->allergies;
            $chargesComments = $record->charges_comments;
            $labResult = $record->lab_result;
        }

        return view('patient_info')->with([
            'patient' => $patient,
            'unreadMessage' => $unreadNotifications,
            'title' => 'Patient Information',
            'allergies' => $allergies,
            'labResult' => $labResult,
            'chargesComments' => $chargesComments
        ]);
    }

    /**
     * Search a specific patient information
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $patient = Patient::where('patient_id', $request['patient_id'])->first();

        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();

        $allergies = null;
        $chargesComments = null;
        $labResult = null;

        foreach ($patient->records as $record) {
            $allergies = $record->allergies;
            $chargesComments = $record->charges_comments;
            $labResult = $record->lab_result;
        }

        return view('patient_info')->with([
            'patient' => $patient,
            'unreadMessage' => $unreadNotifications,
            'title' => 'Patient Information',
            'allergies' => $allergies,
            'labResult' => $labResult,
            'chargesComments' => $chargesComments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $unreadNotifications = Message::where('is_read', false)->limit(3)->get();
        return view('editpatient', compact('patient'))->with([
            'unreadMessage' => $unreadNotifications,
            'title' => 'Edit Patient Information'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update([
            'names' => $request['names'],
            'email' => $request['email'],
            'id_number' => $request['id_number'],
            'patient_id' => $request['patient_id'],
            'dob' => $request['dob'],
            'age' => $request['age'],
            'home_address' => $request['home_address'],
            'sex' => $request['sex']
        ]);

        return redirect('/patient');
    }

    /**
     * Set the recovered patient status to true
     *
     * @return Response
     */
    public function healed(Patient $patient)
    {
        $patient->update([
            'is_recovered'  => true
        ]);

        return redirect(route('patient.show', $patient->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect('/patient');
    }

    public function addPayment(Request $request, Patient $patient)
    {
        $patient->update([
            'fees_required' => $request['total_amount'],
            'fees_paid' => $request['amount_paid']
        ]);

        return redirect(route('patient.show', $patient->id));
    }
}
