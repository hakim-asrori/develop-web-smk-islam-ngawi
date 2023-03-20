<div class="leftside-menu">

    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>

    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm_dark.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{ route('web.app.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('web.user.index') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Pengguna </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('web.blog.index') }}" class="side-nav-link">
                    <i class="uil-package"></i>
                    <span> Blog </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>

</div>
