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


            <div class="container mt-4">
                {{-- New System user--}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal">
                    Add New System User
                </button>

                @isset($alert)
                    <div class="container">
                        <b class="btn {{ 'btn-' . $alertStatus }} py-2 px-5 float-right">{{ $alert }}</b>
                    </div>
                @endisset

            <!-- Modal -->
            <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUserModalLabel">New System User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.add') }}">
                            @csrf

                            <b class="card-text">Add new system user</b>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input name="name" id="" placeholder="Name" type="text" class="form-control shadow" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input name="email" id="" placeholder="E-mail-Address" type="email" class="form-control shadow" required>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input name="password" required id="" placeholder="Password" type="text" class="form-control shadow">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id=""  type="submit" class="form-control btn btn-outline-primary shadow" value="Save">
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

                <hr>

                <form action="{{ route('user.password.change') }}" method="POST">
                    @csrf

                    <b class="card-text">Change Password</b>

                     <div class="row mt-2">
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="" name="old_password" placeholder="Old Password" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="new_password" required id="" placeholder="New Password" type="text" class="form-control shadow">
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id=""  type="submit" class="form-control btn btn-outline-primary shadow" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container">
                {{-- <hr>
                <b>List of users</b>

                <table class="table">
                    <thead class="shadow">
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </thead>

                    <tbody>
                        @isset($users)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="" class="btn-link text-success" data-bs-toggle="modal" data-bs-target="#updateUserModal">Update</a> /
                                        <a href="" class="btn-link text-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>

    @isset($alert)
        <p>{{ $alert }}</p>
    @endisset

    {{-- Notification modal --}}
    @isset ($alert)
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body {{ 'text-' . $alertStatus }}">
                    ! {{ $alert }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    @endisset
</div>
@endsection
