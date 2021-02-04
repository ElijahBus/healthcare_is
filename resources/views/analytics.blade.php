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

            <div class="container mt-3">
                <b class="card-text">Analytics</b>

                <!-- Graphs -->
                <div class="row w-100 mt-4" id="graphs">
                    <div id="primaryGraph" class="col-sm-12 col-md-6"></div>
                    <div id="secondaryGraph" class="col-sm-12 col-md-6"></div>
                </div>

                {{-- All rocords --}}
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card text-left border-0">
                            <div class="card-body">
                                <table class="table mt-3 table-bordered">
                                    <thead class="shadow-lg">
                                        <th>DATE</th>
                                        <th>ALL PATIENTS</th>
                                        <th>NEW PATIENTS</th>
                                        <th>RECOVERED</th>
                                    </thead>
                                    <tbody class="">
                                        @isset($chartsData)
                                            @for ($i = 0; $i < count($chartsData[0]); $i++)
                                                <tr>
                                                    <td>{{ $chartsData[0][$i] }}</td>
                                                    <td>{{ $chartsData[1][$i] }}</td>
                                                    <td>{{ $chartsData[2][$i] }}</td>
                                                    <td>{{ $chartsData[3][$i] }}</td>
                                                </tr>
                                            @endfor
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
</div>
@endsection
