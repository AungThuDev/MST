<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Creative Tim">

    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template_assets/images/mst-icon.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">

    <!-- Data Table-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    @yield('style')
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="d-flex justify-content-center bg-primary">
                <img class="mb-2" src="{{ asset('template_assets/images/mst-logo-min.png') }}" style="width: 200px"
                    alt="">
            </div>

            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @yield('dashboard')" href="{{ url('/admin/dashboard') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('home-page')" href="{{ route('admin.homepage.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Home Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('programme-page')" href="/admin/programme_page">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Programme Page</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('principal')" href="{{ route('admin.principal.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Principal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('banner')" href="{{ route('admin.banner.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Banner</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('event')" href="{{ route('admin.event.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Events</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('campus')" href="{{ route('admin.campus.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Campus</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('category')" href="/admin/categories">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Programme Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('programme')" href="/admin/programmes">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Programmes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('award')" href="{{ route('admin.award.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Awards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('partner')" href="{{ route('admin.partner.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Partners</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('lecturer')" href="{{ route('admin.lecturer.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Lecturers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('info')" href="{{ route('admin.info.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Contact Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('faq')" href="{{ route('admin.faq.index') }}">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">FAQ</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span></span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">
                                <i class=""></i>
                                {{-- <form action="{{ route('logout') }}" method="POST">
                                @csrf
                            <button class="btn btn-primary mb-3">Logout</button> --}}
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <!-- ... (your top navbar content) ... -->
            <div style="width: 100%; margin-right: 20px" class="d-flex justify-content-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger float-right">Logout</button>
                </form>
            </div>

        </nav>
        <!-- Header -->
        <div class="header p-3">
            <div class="card p-2">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    <!-- ... (your script tags) ... -->
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')

    <script>
        $(document).ready(function() {
            let token = document.head.querySelector('meta[name="csrf-token"]');
            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            @if (session('create'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('create') }} created successfully!'
                })
            @endif
            @if (session('update'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('update') }} updated successfully!"
                })
            @endif
        })
    </script>


</body>

</html>
