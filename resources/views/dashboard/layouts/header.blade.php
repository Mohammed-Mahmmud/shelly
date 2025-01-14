<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('admin.mainDashboard.index') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt=""
                                height="22">
                        </span>
                    </a>
                    <a href="{{ route('admin.mainDashboard.index') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('dashboard') }}/assets/images/logo.svg" alt="" height="22">
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <div class="btn btn-outline-warning rounded-circle btn-icon btn-sm" data-bs-toggle="offcanvas"
                        data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                        <i class=" bx bx-carousel"></i>
                    </div>
                    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
                        <div class="offcanvas-body p-0">
                            <div data-simplebar="" class="h-100">
                                <div class="p-4">
                                    <h6 class="fs-md mb-1">Layout</h6>
                                    <p class="text-muted fs-sm">Choose your layout</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-check card-radio">
                                                <input id="customizer-layout01" name="data-layout" type="radio"
                                                    value="vertical" class="form-check-input">
                                                <label class="form-check-label p-0 avatar-md w-100"
                                                    for="customizer-layout01">
                                                    <span class="d-flex gap-1 h-100">
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                <span
                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-grow-1">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span class="bg-light d-block p-1"></span>
                                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Vertical</h5>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check card-radio">
                                                <input id="customizer-layout02" name="data-layout" type="radio"
                                                    value="horizontal" class="form-check-input">
                                                <label class="form-check-label p-0 avatar-md w-100"
                                                    for="customizer-layout02">
                                                    <span class="d-flex h-100 flex-column gap-1">
                                                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                            <span
                                                                class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                            <span
                                                                class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                            <span
                                                                class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                        </span>
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Horizontal</h5>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check card-radio">
                                                <input id="customizer-layout03" name="data-layout" type="radio"
                                                    value="twocolumn" class="form-check-input">
                                                <label class="form-check-label p-0 avatar-md w-100"
                                                    for="customizer-layout03">
                                                    <span class="d-flex gap-1 h-100">
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column gap-1">
                                                                <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-grow-1">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span class="bg-light d-block p-1"></span>
                                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Two Column</h5>
                                        </div>
                                        <!-- end col -->
                                    </div>

                                    <h6 class="mt-4 fs-md mb-1">Theme</h6>
                                    <p class="text-muted fs-sm">Choose your suitable Theme.</p>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme01" name="data-theme" type="radio"
                                                    value="default" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme01">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/light-mode.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Default</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme02" name="data-theme" type="radio"
                                                    value="material" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme02">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/material.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Material</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme03" name="data-theme" type="radio"
                                                    value="creative" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme03">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/creative.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Creative</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme04" name="data-theme" type="radio"
                                                    value="minimal" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme04">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/minimal.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Minimal</h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme05" name="data-theme" type="radio"
                                                    value="modern" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme05">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/modern.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Modern</h5>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-6">
                                            <div class="form-check card-radio">
                                                <input id="customizer-theme06" name="data-theme" type="radio"
                                                    value="interaction" class="form-check-input">
                                                <label class="form-check-label p-0" for="customizer-theme06">
                                                    <img src="{{ asset('dashboard') }}/assets/images/custom-theme/interaction.png"
                                                        alt="" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Interaction</h5>
                                        </div><!-- end col -->
                                    </div>

                                    <h6 class="mt-4 fs-md mb-1">Color Scheme</h6>
                                    <p class="text-muted fs-sm">Choose Light or Dark Scheme.</p>

                                    <div class="colorscheme-cardradio">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="form-check card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-bs-theme" id="layout-mode-light" value="light">
                                                    <label class="form-check-label p-0 bg-transparent"
                                                        for="layout-mode-light">
                                                        <img src="{{ asset('dashboard') }}/assets/images/custom-theme/light-mode.png"
                                                            alt="" class="img-fluid">
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check card-radio dark">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-bs-theme" id="layout-mode-dark" value="dark">
                                                    <label class="form-check-label p-0 bg-transparent"
                                                        for="layout-mode-dark">
                                                        <img src="{{ asset('dashboard') }}/assets/images/custom-theme/dark-mode.png"
                                                            alt="" class="img-fluid">
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                                            </div>


                                        </div>
                                    </div>

                                    <div id="layout-width">
                                        <h6 class="mt-4 fs-md mb-1">Layout Width</h6>
                                        <p class="text-muted fs-sm">Choose Fluid or Boxed layout.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-layout-width" id="layout-width-fluid"
                                                        value="fluid">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="layout-width-fluid">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Fluid</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-layout-width" id="layout-width-boxed"
                                                        value="boxed">
                                                    <label class="form-check-label p-0 avatar-md w-100 px-2"
                                                        for="layout-width-boxed">
                                                        <span class="d-flex gap-1 h-100 border-start border-end">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Boxed</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="layout-position">
                                        <h6 class="mt-4 fs-md mb-1">Layout Position</h6>
                                        <p class="text-muted fs-sm">Choose Fixed or Scrollable Layout Position.</p>

                                        <div class="btn-group radio" role="group">
                                            <input type="radio" class="btn-check" name="data-layout-position"
                                                id="layout-position-fixed" value="fixed">
                                            <label class="btn btn-light w-sm"
                                                for="layout-position-fixed">Fixed</label>

                                            <input type="radio" class="btn-check" name="data-layout-position"
                                                id="layout-position-scrollable" value="scrollable">
                                            <label class="btn btn-light w-sm ms-0"
                                                for="layout-position-scrollable">Scrollable</label>
                                        </div>
                                    </div>

                                    <h6 class="mt-4 fs-md mb-1">Topbar Color</h6>
                                    <p class="text-muted fs-sm">Choose Light or Dark Topbar Color.</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-check card-radio">
                                                <input class="form-check-input" type="radio" name="data-topbar"
                                                    id="topbar-color-light" value="light">
                                                <label class="form-check-label p-0 avatar-md w-100"
                                                    for="topbar-color-light">
                                                    <span class="d-flex gap-1 h-100">
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                <span
                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-grow-1">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span class="bg-light d-block p-1"></span>
                                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check card-radio">
                                                <input class="form-check-input" type="radio" name="data-topbar"
                                                    id="topbar-color-dark" value="dark">
                                                <label class="form-check-label p-0 avatar-md w-100"
                                                    for="topbar-color-dark">
                                                    <span class="d-flex gap-1 h-100">
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                <span
                                                                    class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-grow-1">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span class="bg-primary d-block p-1"></span>
                                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                                        </div>
                                    </div>

                                    <div id="sidebar-size">
                                        <h6 class="mt-4 fs-md mb-1">Sidebar Size</h6>
                                        <p class="text-muted fs-sm">Choose a size of Sidebar.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar-size" id="sidebar-size-default"
                                                        value="lg">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-size-default">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Default</h5>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar-size" id="sidebar-size-compact"
                                                        value="md">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-size-compact">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Compact</h5>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar-size" id="sidebar-size-small"
                                                        value="sm">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-size-small">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                                    <span
                                                                        class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Small (Icon View)</h5>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar-size" id="sidebar-size-small-hover"
                                                        value="sm-hover">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-size-small-hover">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                                    <span
                                                                        class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Small Hover View</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="sidebar-view">
                                        <h6 class="mt-4 fs-md mb-1">Sidebar View</h6>
                                        <p class="text-muted fs-sm">Choose Default or Detached Sidebar view.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-layout-style" id="sidebar-view-default"
                                                        value="default">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-view-default">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Default</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-layout-style" id="sidebar-view-detached"
                                                        value="detached">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-view-detached">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span
                                                                class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                                <span
                                                                    class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                                <span
                                                                    class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                                <span
                                                                    class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                            </span>
                                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Detached</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sidebar-color">
                                        <h6 class="mt-4 fs-md mb-1">Sidebar Color</h6>
                                        <p class="text-muted fs-sm">Choose a color of Sidebar.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseBgGradient.show">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-light" value="light">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-color-light">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseBgGradient.show">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-dark" value="dark">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="sidebar-color-dark">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                                            </div>
                                            <div class="col-4">
                                                <button
                                                    class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseBgGradient" aria-expanded="false"
                                                    aria-controls="collapseBgGradient">
                                                    <span class="d-flex gap-1 h-100">
                                                        <span class="flex-shrink-0">
                                                            <span
                                                                class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                                <span
                                                                    class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                <span
                                                                    class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                            </span>
                                                        </span>
                                                        <span class="flex-grow-1">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span class="bg-light d-block p-1"></span>
                                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Gradient</h5>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="collapse" id="collapseBgGradient">
                                            <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-gradient"
                                                        value="gradient">
                                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                                        for="sidebar-color-gradient">
                                                        <span
                                                            class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                                    </label>
                                                </div>
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-gradient-2"
                                                        value="gradient-2">
                                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                                        for="sidebar-color-gradient-2">
                                                        <span
                                                            class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                                    </label>
                                                </div>
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-gradient-3"
                                                        value="gradient-3">
                                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                                        for="sidebar-color-gradient-3">
                                                        <span
                                                            class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                                    </label>
                                                </div>
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-sidebar" id="sidebar-color-gradient-4"
                                                        value="gradient-4">
                                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                                        for="sidebar-color-gradient-4">
                                                        <span
                                                            class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="sidebar-img">
                                        <h6 class="mt-4 fw-semibold fs-base">Sidebar Images</h6>
                                        <p class="text-muted fs-sm">Choose a image of Sidebar.</p>

                                        <div class="d-flex gap-2 flex-wrap img-switch">
                                            <div class="form-check sidebar-setting card-radio">
                                                <input class="form-check-input" type="radio"
                                                    name="data-sidebar-image" id="sidebarimg-none" value="none">
                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                    for="sidebarimg-none">
                                                    <span
                                                        class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                                        <i class="ri-close-fill fs-3xl"></i>
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="form-check sidebar-setting card-radio">
                                                <input class="form-check-input" type="radio"
                                                    name="data-sidebar-image" id="sidebarimg-01" value="img-1">
                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                    for="sidebarimg-01">
                                                    <img src="{{ asset('dashboard') }}/assets/images/sidebar/img-sm-1.jpg"
                                                        alt="" class="avatar-md w-auto object-cover">
                                                </label>
                                            </div>

                                            <div class="form-check sidebar-setting card-radio">
                                                <input class="form-check-input" type="radio"
                                                    name="data-sidebar-image" id="sidebarimg-02" value="img-2">
                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                    for="sidebarimg-02">
                                                    <img src="{{ asset('dashboard') }}/assets/images/sidebar/img-sm-2.jpg"
                                                        alt="" class="avatar-md w-auto object-cover">
                                                </label>
                                            </div>
                                            <div class="form-check sidebar-setting card-radio">
                                                <input class="form-check-input" type="radio"
                                                    name="data-sidebar-image" id="sidebarimg-03" value="img-3">
                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                    for="sidebarimg-03">
                                                    <img src="{{ asset('dashboard') }}/assets/images/sidebar/img-sm-3.jpg"
                                                        alt="" class="avatar-md w-auto object-cover">
                                                </label>
                                            </div>
                                            <div class="form-check sidebar-setting card-radio">
                                                <input class="form-check-input" type="radio"
                                                    name="data-sidebar-image" id="sidebarimg-04" value="img-4">
                                                <label class="form-check-label p-0 avatar-sm h-auto"
                                                    for="sidebarimg-04">
                                                    <img src="{{ asset('dashboard') }}/assets/images/sidebar/img-sm-4.jpg"
                                                        alt="" class="avatar-md w-auto object-cover">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="preloader-menu">
                                        <h6 class="mt-4 fw-semibold fs-base">Preloader</h6>
                                        <p class="text-muted fs-sm">Choose a preloader.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-preloader" id="preloader-view-custom"
                                                        value="enable">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="preloader-view-custom">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <!-- <div id="preloader"> -->
                                                        <span class="d-flex align-items-center justify-content-center">
                                                            <span class="spinner-border text-primary avatar-xxs m-auto"
                                                                role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </span>
                                                        </span>
                                                        <!-- </div> -->
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Enable</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check sidebar-setting card-radio">
                                                    <input class="form-check-input" type="radio"
                                                        name="data-preloader" id="preloader-view-none"
                                                        value="disable">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="preloader-view-none">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-sm text-center fw-medium mt-2">Disable</h5>
                                            </div>
                                        </div>

                                    </div><!-- end preloader-menu -->
                                </div>
                            </div>

                        </div>
                        <div class="offcanvas-footer border-top p-3 text-center">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-danger w-100"
                                        id="reset-layout">Reset</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bi bi-arrows-fullscreen fs-lg'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-sun align-middle fs-3xl"></i>
                    </button>
                    <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                        <a href="#!" class="dropdown-item" data-mode="light"><i
                                class="bi bi-sun align-middle me-2"></i> Default (light mode)</a>
                        <a href="#!" class="dropdown-item" data-mode="dark"><i
                                class="bi bi-moon align-middle me-2"></i> Dark</a>
                        <a href="#!" class="dropdown-item" data-mode="auto"><i
                                class="bi bi-moon-stars align-middle me-2"></i> Auto (system default)</a>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('dashboard/assets/images/companies/img-3.png') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->email }}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">{{ Auth::user()->name }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                        <div class="dropdown-divider"></div>
                        <form action ="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn" type="submit">
                                <i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i>
                                <span class="align-middle text-muted fs-lg align-middle me-1"
                                    data-key="t-logout">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
