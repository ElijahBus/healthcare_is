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

            {{-- New Patient Form--}}
            <div class="container mt-4">
                <b class="card-text">Add new patient</b>
                <form method="POST" action="{{ route('patient.store') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="names" required id="" placeholder="Names" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="email" required id="" placeholder="E-mail-Address" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="id_number" required id="" placeholder="Id Number" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="dob" required id="" placeholder="Birth date" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="age" required id="" placeholder="Age" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select required name="sex" id="" class="form-control bg-light shadow">
                                        <option value="">Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="home_address" required id="" placeholder="Home Address" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="patient_id" required id="" placeholder="Patient Id" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id=""  type="submit" class="form-control btn btn-outline-primary shadow" value="Save changes">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
