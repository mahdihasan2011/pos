<div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-overflow os-host-overflow-y os-host-transition">
    <div class="card card-gray card-outline">
        <div class="card-body box-profile pb-0">
            {{-- <a class="float-right text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="fas fa-sign-out-alt"></i>
            </a> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ !empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('public/master/dist/img/user2-160x160.jpg') }}" alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
            <div class="text-muted text-center">{{ Auth::user()->role_user->roles->display_name }}</div>
            <div class="text-muted text-center">{{ Auth::user()->email }}</div>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item pb-0">
                    <input type="file" name="profile_image"/>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <a class="btn btn-outline-secondary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
