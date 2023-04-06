<div class="leftside-menu">

    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/logo.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo.png') }}" alt="" height="16">
        </span>
    </a>

    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo.png') }}" alt="" height="16">
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
            @can('admin')
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users"
                        class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> Pengguna </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('web.admin.index') }}">
                                    <span> Admin </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.teacher.index') }}">
                                    <span> Guru </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.student.index') }}">
                                    <span> Siswa </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            <li class="side-nav-item">
                <a href="{{ route('web.blog.index') }}" class="side-nav-link">
                    <i class="uil-package"></i>
                    <span> Blog </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('web.gallery.index') }}" class="side-nav-link">
                    <i class="uil-comment-alt-image"></i>
                    <span> Galeri </span>
                </a>
            </li>
            @can('admin')
                <li class="side-nav-item">
                    <a href="{{ route('web.contact.index') }}" class="side-nav-link">
                        <i class="mdi mdi-contacts"></i>
                        <span> Kontak </span>
                    </a>
                </li>
            @endcan
        </ul>

        <div class="clearfix"></div>

    </div>

</div>
