<div class="sb-sidenav-menu">
    <div class="nav">
        @if(auth()->user()->IMAGEFILE)
            <div class="sb-sidenav-menu-heading">PROFILE PHOTO</div>
            <center>
                <img src="{{ asset('storage/'.auth()->user()->IMAGEFILE) }}" width="50" height="50">
            </center>
        @endif
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link" href="{{ route('home') }}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
            Profile Management
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('my-profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                    My Profile
                </a>
                <a class="nav-link" href="{{ route('my-profile-password') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                    Change New Password
                </a>
            </nav>
        </div>

        <a class="nav-link" href="{{ route('pelajar.index') }}">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Pelajar
        </a>
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    {{ auth()->user()->NAME }}
</div>