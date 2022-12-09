<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Manajemen</div>
                @foreach ($data['menu'] as $menu)
                    <a class="nav-link" href="{{ $menu->url }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        {{ $menu->menu_label }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->username }}
        </div>
    </nav>
</div>
