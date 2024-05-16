<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index', ['locale' => app()->getLocale()]) }}">
            <i class="nav-icon fas fa-solid fa-house"></i>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle text-white" href="#">
            <i class="nav-icon fas fa-tags"></i>
            Atribut
        </a>
        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('brand.index', ['locale' => app()->getLocale()]) }}">
                    {{ __('Merk') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index', ['locale' => app()->getLocale()]) }}">
                    {{ __('Kategori') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('unit.index', ['locale' => app()->getLocale()]) }}">
                    {{ __('Satuan') }}
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('catalog.index', ['locale' => app()->getLocale()]) }}">
            <i class="nav-icon fa-solid fa-bag-shopping"></i>
            {{ __('Katalog') }}
        </a>
    </li>

    @if (Auth::user() && Auth::user()->hasRole('director'))
        <li class="nav-group" aria-expanded="false">
            <a class="nav-link nav-group-toggle" href="#">
                <i class="nav-icon fas fa-cog"></i>
                Pengaturan
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('setting-admin.index', ['locale' => app()->getLocale()]) }}">
                        {{ __('Pengaturan Peran') }}
                    </a>
                </li>
            </ul>
        </li>
    @endif
</ul>
