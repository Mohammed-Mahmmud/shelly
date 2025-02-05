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
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link menu-link @yield('products-active')"> <i
                            class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Products</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link menu-link @yield('categories-active')"> <i
                            class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Categories</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.types.index') }}" class="nav-link menu-link @yield('types-active')"> <i
                            class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Types</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.technologies.index') }}" class="nav-link menu-link @yield('technologies-active')"> <i
                            class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Technologies</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product-using.index') }}" class="nav-link menu-link @yield('product-using-active')">
                        <i class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Product-Using</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link menu-link @yield('pages-active')">
                        <i class=" bx bx-book-content"></i>
                        <span data-key="t-calendar">Pages</span> </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
