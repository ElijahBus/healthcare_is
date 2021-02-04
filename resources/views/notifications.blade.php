<div class="top-cards">
    <div class="row d-flex justify-content-end pr-4">

        @isset($unreadMessage)
            @foreach ($unreadMessage as $notification)
                <div class="col-3 d-flex justify-content-around top-card bg-white shadow">
                    <i class="fa fa-bell text-danger" aria-hidden="true"></i>
                    <div class="details text-right">
                        <b class="text-danger">New Message</b> <br>
                        <span class="">{{ $notification->patient_names }}</span>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
</div>
