<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.mainDashboard.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
        </a>
        <a href="{{ route('admin.mainDashboard.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-apps">Menu</span>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link menu-link @yield('users-active')"> <i
                            class="bx bx-user-circle"></i>
                        <span data-key="t-calendar">Admins</span> </a>
                </li>
                {{-- Product --}}
                <li class="nav-item">
                    <a href="#sidebarProducts" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="sidebarProducts">
                        <i class="ph-storefront"></i> <span data-key="t-product">Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link  @yield('products-active')">View
                                    Products</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.product.categories.index') }}"
                                    class="nav-link @yield('product-categories-active')">
                                    <span>Product Categories</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.types.index') }}" class="nav-link @yield('types-active')">
                                    <span>Product Types</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.technologies.index') }}"
                                    class="nav-link @yield('technologies-active')">
                                    <span>Product Technologies</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.using.index') }}" class="nav-link @yield('product-using-active')">
                                    <span>Product Using</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Pages --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link menu-link @yield('pages-active')">
                        <i class="bx bx-file"></i>
                        <span>Pages</span> </a>
                </li>

                {{-- solutions --}}
                <li class="nav-item">
                    <a href="{{ route('admin.solutions.index') }}" class="nav-link menu-link @yield('solutions-active')">
                        <i class="bx bx-file"></i>
                        <span>Solutions</span> </a>
                </li>

                {{-- projects --}}
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link menu-link @yield('projects-active')">
                        <i class="bx bx-file"></i>
                        <span>Projects</span> </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
