<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/images/brand/logo/logo.svg') }}" alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                </a>
            </li>

            <!-- MASTER DATA -->
            @canany(['show products'])
                <li class="nav-item">
                    <div class="navbar-heading">Master</div>
                </li>
            @endcanany

            @can('show products')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">
                        <i data-feather="box" class="nav-icon icon-xs me-2"></i>
                        Produk
                    </a>
                </li>
            @endcan

            @can('show users')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i data-feather="user" class="nav-icon icon-xs me-2"></i>
                        Pengguna
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <div class="navbar-heading">Transaction</div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                    <i data-feather="shopping-cart" class="nav-icon icon-xs me-2"></i>
                    Semua Order
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i data-feather="clock" class="nav-icon icon-xs me-2"></i>
                    Menunggu Konfirmasi
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item d-none">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="nav-icon icon-xs me-2">
                    </i> Pages
                </a>

                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="./pages/profile.html">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow" href="./pages/settings.html">
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./pages/billing.html">
                                Billing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./pages/pricing.html">
                                Pricing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./pages/404-error.html">
                                404 Error
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
