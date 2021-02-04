@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center d-flex main-container">
        <div class="col col-2 menu-container">

            {{-- Navigation memu --}}
            @include('partials.menu')
        </div>

        <div class="col col-10 bg-white shadow">
            {{-- Header notifications --}}
            @include('notifications')

            {{-- Patient profile --}}
            @isset($patient)
                <div class="patient-profile">
                    <div class="checking-time">
                        <b class="badge">Checkin date:</b>
                        <b>{{ $patient->created_at }}</b>
                    </div>

                    <div class="profile mt-4">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-around ">
                                <img src="{{ asset('images/avatar.png') }}" alt="" srcset="" width="60" height="60" class="align-self-center">
                                <div class="details text-right">
                                    <b class="">{{ $patient->names }}</b> <br>
                                    <span class="badge">{{ $patient->dob }}</span> <br>
                                    <span class="badge">{{ $patient->age }} Years old / {{ $patient->sex }}</span>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-around ">
                                <div class="details ">
                                    <b class="">ID: {{ $patient->patient_id }}</b> <br>
                                    <span class="badge">Address: {{ $patient->home_address }}</span>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center  ">
                                <button class="btn btn-warning btn-sm check-payment-btn h6" data-bs-toggle="modal" data-bs-target="#checkPaymentModal">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <b>Check payment</b>
                                </button>

                                @if ($patient->is_recovered == false)
                                    <a href="{{ route('patient.healed', $patient->id) }}" class="btn btn-outline-success btn-sm check-payment-btn h6 d-flex align-items-center">
                                        <i class="fa fa-heart mr-1" aria-hidden="true"></i>
                                        <b>Healed</b>
                                    </a>
                                @elseif($patient->is_recovered == true)
                                    <a href="{{ route('patient.healed', $patient->id) }}" class="btn btn-success btn-sm check-payment-btn h6 d-flex align-items-center">
                                        <i class="fa fa-heart mr-1" aria-hidden="true"></i>
                                        <b>Healed</b>
                                    </a>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="checkPaymentModal" tabindex="-1" aria-labelledby="checkPaymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="checkPaymentModalLabel">Check payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('patient.payment.add', $patient->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <b class="card-text">Patient paayment info</b>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="">Total required</label>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input name="total_amount" value="{{ $patient->fees_required }}" id=""  type="text" class="form-control shadow {{ ($patient->fees_required == $patient->fees_paid ) ? 'bg-sucess' : '' }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Amount paid</label>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input name="amount_paid" id="" value="{{ $patient->fees_paid }}"  type="text" class="form-control shadow" >
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id=""  type="submit" class="form-control btn btn-outline-success shadow" value="Pay">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- Patient clinical records --}}
            <div class="container my-4">
                <div class="row mt-4">
                    <div class="col-4 text-center p-3 medical-bg-menu"><b>MEDICAL BACKGROUND</b></div>
                    <div class="col-4 text-center p-3 lab-result-menu"><b>LAB RESULTS</b></div>
                    <div class="col-4 text-center p-3 insurance-menu"><b>COMMENTS ON CHARGES</b></div>
                </div>
            </div>

            @foreach ($patient->records as $record)
                <div class="row">
                    <div class="col-4">
                        <b>Allergies, Meds, Problems</b>

                        <div class="card details-card mt-2 shadow p-2">
                            {{ $record->allergies }}
                        </div>
                    </div>
                <div class="col-4">
                        <b>Diagnostic results</b>

                        <div class="card details-card mt-2 shadow p-2">
                            {{ $record->lab_result }}
                        </div>
                    </div>
                    <div class="col-4">
                        <b>Medical insurances and charges</b>

                        <div class="card details-card mt-2 shadow p-2">
                            {{ $record->charges_comments }}
                        </div>
                    </div>
                </div>

            @endforeach


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#updateRecords">
            Update Record ..
        </button>

        <div class="modal fade" id="updateRecords" tabindex="-1" aria-labelledby="updateRecordsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header shadow">
                        <h5 class="modal-title" id="updateRecordsLabel">Update Patient Records</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="{{ route('patient-record.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                <div class="form-group">
                                    <label for=""><b>Allergies, Problems</b></label>
                                    <textarea name="allergies" required id="" cols="" rows="" class="form-control">{{ $allergies }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Diagnostic results</b></label>
                                    <textarea name="lab_result" id="" cols="30" rows="" class="form-control">{{ $labResult }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Charges, Insurance</b></label>
                                    <textarea name="charges_comments" required id="" cols="30" rows="" class="form-control">{{ $chargesComments }}</textarea>
                                </div>

                                <div class="modal-footer mt-3">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->

            @endisset
        </div>

    </div>
</div>
@endsection
