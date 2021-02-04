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
            {{-- Show 3 recent unred messages --}}
            @include('notifications')

            {{-- pie chart --}}
            <div id="chart-container"></div>

            {{-- Analytics cards --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow bg-white">
                            <b class="card-text text-center mt-2 ">All patients</b>
                            <div class="number">{{ $allPatients }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow bg-white">
                            <b class="card-text text-center mt-2 ">New patients</b>
                            <div class="number">{{ $newPatients }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow bg-white">
                            <b class="card-text text-center mt-2 ">Recovered patients</b>
                            <div class="number">{{ $recoveredPatients }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Last five registered patients --}}
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card text-left border-0">
                        <div class="card-body">
                            <b class="card-text">Last 5 registered patients</b>
                            <table class="table mt-3 table-bordered">
                                <thead class="shadow-lg">
                                    <th>PATIENT NAMES</th>
                                    <th>EMAIL</th>
                                    <th>ID NUMBER</th>
                                </thead>

                                <tbody class="">
                                    @isset($lastRegisteredPatients)
                                        @foreach ($lastRegisteredPatients as $patient)
                                            <tr>
                                                <td>{{ $patient->names }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->patient_id }}</td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>

                            {{-- Last 5 healed patients --}}
                            <b class="card-text">Last 5 recovered patients</b>
                            <table class="table mt-3 table-bordered">
                                <thead class="shadow-lg">
                                    <th>PATIENT NAMES</th>
                                    <th>EMAIL</th>
                                    <th>ID NUMBER</th>
                                </thead>

                                <tbody class="">
                                   @isset($lastRecovered)
                                        @foreach ($lastRecovered as $patient)
                                            <tr>
                                                <td>{{ $patient->names }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->patient_id }}</td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
