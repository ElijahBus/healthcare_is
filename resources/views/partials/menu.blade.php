<div class="menu ml-4">
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-table menu-icon" aria-hidden="true"></i>
        <a href="{{ route('home') }}">
            <b class="h6 text-white">Dashboard</b>
        </a>
    </div>
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-users menu-icon" aria-hidden="true"></i>
        <a href="{{ route('patient.latest') }}">
            <b class="h6 text-white">Patient Info</b>
        </a>
    </div>
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-users menu-icon" aria-hidden="true"></i>
        <a href="{{ route('patient.index') }}">
            <b class="h6 text-white">All patients</b>
        </a>
    </div>
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-comment-o menu-icon" aria-hidden="true"></i>
        <a href="{{ route('message.index') }}">
            <b class="h6 text-white">Messages</b>
        </a>
    </div>
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-plus-circle menu-icon" aria-hidden="true"></i>
        <a href="{{ route('patient.create') }}">
            <b class="h6 text-white">New patient</b>
        </a>
    </div>
    {{-- <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-calendar menu-icon" aria-hidden="true"></i>
        <a href="{{ route('calendar') }}">
            <b class="h6 text-white">Calendar</b>
        </a>
    </div> --}}
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-area-chart menu-icon" aria-hidden="true"></i>
        <a href="{{ route('analytics') }}">
            <b class="h6 text-white">Analytics</b>
        </a>
    </div>
    <div class="menu-item my-1 rounded pl-2">
        <i class="fa fa-cog menu-icon" aria-hidden="true"></i>
        <a href="{{ route('settings') }}">
            <b class="h6 text-white">Settings</b>
        </a>
    </div>
    <div class="menu-item mt-1 mb-5 rounded pl-2">
        <i class="fa fa-power-off menu-icon" aria-hidden="true"></i>
        <a class=""
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

            <b class="h6 text-white">Logout</b>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div>


