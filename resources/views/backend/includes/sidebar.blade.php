<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Charts -->

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/slider/list') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Slider</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/abouts') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Abouts</span></a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ url('/resumes') }}">--}}
{{--            <i class="fas fa-fw fa-chart-area"></i>--}}
{{--            <span>Resume</span></a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ url('/experiences') }}">--}}
{{--            <i class="fas fa-fw fa-chart-area"></i>--}}
{{--            <span>Experience</span></a>--}}
{{--    </li>--}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/portfolios') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Portfolio</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/services') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Services</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/blogs') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Blog</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/priceings') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pricing</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/teams') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Team</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/client/list') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Clients</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/contact') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Contact</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/settings') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Settings</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>
