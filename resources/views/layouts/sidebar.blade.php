<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}" target="_blank">
            <img src="{{ asset('/assets2/img/logo-ct-dark.png') }}" width="26" height="26" class="navbar-brand-img h-100" alt="SpaceHub logo">
            <span class="ms-1 font-weight-bold text-primary">SpaceHub Admin</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('chart') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles') ? 'active' : '' }}" href="{{ url('roles') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="{{ url('categories') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category rooms</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('rooms') ? 'active' : '' }}" href="{{ url('rooms') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">rooms</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookings') ? 'active' : '' }}" href="{{ url('bookings') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookingsindex') ? 'active' : '' }}" href="{{ url('bookingsindex') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">keranjang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('transactions') ? 'active' : '' }}" href="{{ url('/transactions') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">history</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<style>
    :root {
        --primary: #ff6b6b;
        --primary-light: #ff8787;
        --secondary: #4ecdc4;
        --background: #ffffff;
        --text: #333333;
        --text-light: #6c757d;
    }

    .sidenav {
        background-color: var(--background) !important;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15);
    }

    .navbar-brand span {
        color: var(--primary) !important;
    }

    .nav-link {
        color: var(--text) !important;
        transition: all 0.3s ease;
    }

    .nav-link:hover, .nav-link.active {
        color: var(--primary) !important;
        background-color: rgba(255, 107, 107, 0.1);
    }

    .nav-link .icon {
        background-color: rgba(255, 107, 107, 0.1);
        color: var(--primary) !important;
    }

    .nav-link:hover .icon, .nav-link.active .icon {
        background-color: var(--primary);
        color: var(--background) !important;
    }

    .text-primary {
        color: var(--primary) !important;
    }

    .opacity-6 {
        opacity: 0.6;
    }

    .nav-item h6 {
        color: var(--text-light);
    }

    .icon-shape {
        width: 32px;
        height: 32px;
        background-position: 50%;
        border-radius: 0.5rem;
    }

</style>

