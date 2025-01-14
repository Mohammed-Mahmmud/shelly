<!doctype html>
<html lang="en" data-layout="vertical" data-layout-width="fluid" data-layout-position="scrollable" data-sidebar="dark" data-preloader="enable" data-theme="light" data-topbar="dark" data-bs-theme="light">


<head>
    @include('dashboard.layouts.main-head')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @if(App::getLocale()== "ar")
        <div dir="rtl">
            @else
            <div>
                @endif
            </div>
            @yield('content')
        </div>
        @include('dashboard.layouts.scripts')

</body>
</html>
