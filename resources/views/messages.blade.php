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

            {{-- All messages --}}
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card text-left border-0">
                        <div class="card-body">
                            <table class="table mt-3 table-bordered">
                                <thead class="shadow-lg">
                                    <th>PATIENT NAMES</th>
                                    <th>ROOM NUMBER</th>
                                    <th>MESSAGE</th>
                                    <th>ACTIONS</th>
                                </thead>

                                <tbody class="">
                                    @isset($messages)
                                        @foreach ($messages as $message)
                                            <tr class="message-row shadow-sm {{ ($message->is_read) ? 'bg-white' : 'text-bold'  }}">
                                                <td>
                                                    {{ $message->patient_names }}
                                                </td>
                                                <td>
                                                    {{ $message->room_number }}
                                                </td>
                                                <td class="message-body">
                                                    <i>{{ $message->content }}</i>
                                                </td>
                                                <td>
                                                    <a href="{{ route('message.read', $message->id) }}">
                                                        <i class="fa fa-envelope-o menu-icon" aria-hidden="true"></i>
                                                        Mark as read
                                                    </a>
                                                </td>
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
