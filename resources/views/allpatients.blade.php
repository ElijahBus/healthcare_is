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

            {{-- Last five registered patients --}}
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card text-left border-0">
                        <div class="card-body">
                            <b class="card-text">All patients</b>
                            <table class="table mt-3 table-bordered">
                                <thead class="shadow-lg">
                                    <th>PATIENT NAMES</th>
                                    <th>EMAIL</th>
                                    <th>ID NUMBER</th>
                                </thead>

                                <tbody class="">
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->names }}</td>
                                            <td>{{ $patient->email }}</td>
                                            <td>{{ $patient->patient_id }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('patient.edit', $patient->id) }}" class="btn-link text-sucess"> Update</a> /
                                                <form action="{{ route('patient.destroy', $patient->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-link text-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
