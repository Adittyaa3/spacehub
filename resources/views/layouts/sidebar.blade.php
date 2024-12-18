@php

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



    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('dashboard') }}" target="_blank">
            <img src="{{ asset('/assets2/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Creative Tim</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is($menu->url) ? 'active' : '' }}" href="{{ url($menu->url) }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="{{ $menu->icon ?? 'ni ni-bullet-list text-dark text-sm opacity-10' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ $menu->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
        <!-- Logout Button at the Bottom -->
        <div class="sidenav-footer mx-3 mt-3 pt-3 border-top">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm w-100 mb-3">Logout</button>
            </form>
        </div>

    </aside>
