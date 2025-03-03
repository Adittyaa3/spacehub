    {{-- @php
        $userRole = auth()->user()->role_id;
        $currentUrl = request()->url(); // Mendapatkan URL saat ini

        // Ambil semua menu aktif yang dapat diakses oleh role user
        $menus = DB::table('menus')
            ->join('role_menu', 'menus.id', '=', 'role_menu.menu_id')
            ->join('roles', 'roles.id', '=', 'role_menu.role_id')
            ->where('menus.status', '1') // Menggunakan kolom 'status' untuk mengecek menu aktif
            ->where('roles.id', $userRole)
            ->select('menus.*')
            ->get();

        // Ambil submenu (children) jika diperlukan
        $menuTree = [];
        foreach ($menus as $menu) {
            if ($menu->parent_id == null) {
                $menuTree[$menu->id] = $menu;
                $menuTree[$menu->id]->children = [];
            }
        }

        foreach ($menus as $menu) {
            if ($menu->parent_id != null && isset($menuTree[$menu->parent_id])) {
                $menuTree[$menu->parent_id]->children[] = $menu;
            }
        }
    @endphp



    <aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 ps" id="sidenav-main">
    <div class="sidenav-header">
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="m-0 navbar-brand" href="{{ url('dashboard') }}" target="_blank">
            <img src="{{ asset('/assets2/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Creative Tim</span>
        </a>
    </div>
    <hr class="mt-0 horizontal dark">
    <div class="w-auto collapse navbar-collapse ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is($menu->url) ? 'active' : '' }}" href="{{ url($menu->url) }}">
                        <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                            <i class="{{ $menu->icon ?? 'ni ni-bullet-list text-dark text-sm opacity-10' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ $menu->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
        <!-- Logout Button at the Bottom -->
        <div class="pt-3 mx-3 mt-3 sidenav-footer border-top">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mb-3 btn btn-danger btn-sm w-100">Logout</button>
            </form>
        </div>

    </aside>
 --}}


 <aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-4 ps" id="sidenav-main">
    <div class="sidenav-header">
        <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="m-0 navbar-brand" href="{{ url('dashboard') }}" target="_blank">
            <img src="{{ asset('/assets2/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Creative Tim</span>
        </a>
    </div>
    <hr class="mt-0 horizontal dark">
    <div class="w-auto collapse navbar-collapse ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles') ? 'active' : '' }}" href="{{ url('/roles') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-key-25"></i>
                    </div>
                    <span class="nav-link-text ms-1">Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('menus') ? 'active' : '' }}" href="{{ url('/menus') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ url('/users') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="{{ url('/categories') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category rooms</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('rooms') ? 'active' : '' }}" href="{{ url('/rooms') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-square-pin"></i>
                    </div>
                    <span class="nav-link-text ms-1">Room</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookings') ? 'active' : '' }}" href="{{ url('/bookings') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="nav-link-text ms-1">Booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('history') ? 'active' : '' }}" href="{{ url('/history') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-time-alarm"></i>
                    </div>
                    <span class="nav-link-text ms-1">History</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('settings') ? 'active' : '' }}" href="{{ url('/settings') }}">
                    <div class="text-center icon icon-shape icon-sm border-radius-md me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-settings"></i>
                    </div>
                    <span class="nav-link-text ms-1">Setting menu</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Logout Button at the Bottom -->
    <div class="pt-3 mx-3 mt-3 sidenav-footer border-top">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mb-3 btn btn-danger btn-sm w-100">Logout</button>
        </form>
    </div>
</aside>
