<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link" href="{{ route('home') }}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>

        <a class="nav-link" href="{{ route('my-profile') }}">
            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
            My Profile
        </a>

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