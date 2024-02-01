<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('template_assets/style.css') }}">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400;1,9..40,500&display=swap"
        rel="stylesheet">
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @yield('style')
</head>

<body>
<header class="fixed-top">
    <div id="address-bar"
         class="d-none d-md-flex justify-content-between align-items-center text-white px-md-4 py-md-3"
         style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="contact-bar d-none d-md-flex justify-content-between gap-5" style="font-size: 14px;">
            @if ($phoneNumber1)
                <p>Phone : {{ $phoneNumber1 }}</p>
            @endif
            @if ($email)
                <p>Email : {{ $email }}</p>
            @endif
            <p>Opening Hours : Mon - Fri : 09:00 - 17:00</p>
        </div>
        <div class="d-none d-lg-flex justify-content-between gap-3">
            @if ($facebook)
                <a style="text-decoration: none; color: #ffffff;" target="_blank" href="{{ $facebook }}"><i
                        class="fa-brands fa-facebook-f"></i></a>
            @endif
            @if ($linkedin)
                <a style="text-decoration: none; color: #ffffff;" target="_blank" href="{{ $linkedin }}"><i
                        class="fa-brands fa-linkedin"></i></a>
            @endif
            @if ($youtube)
                <a style="text-decoration: none; color: #ffffff;" target="_blank" href="{{ $youtube }}"><i
                        class="fa-brands fa-youtube"></i></a>
            @endif
        </div>
    </div>
    <nav id="nav-bar" class="navbar navbar-expand-lg text-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('template_assets/images/mst-logo-min.png') }}" alt="uni logo"
                     style="max-width: 150px; max-height: 130px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel" style="background-color: #010035;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <img src="{{ asset('template_assets/images/mst-logo-min.png') }}" alt="uni logo"
                             style="max-width: 150px; max-height: 130px;">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page"
                               href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="/academics" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Programmes
                            </a>
                            <ul class="dropdown-menu bg-white">
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item dropdowns text-dark"
                                           onclick="navigateToPage('{{ "/academics#$category->name" }}')"
                                           href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page"
                               href="{{ url('/faculty') }}">Faculty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page"
                               href="{{ url('/event') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page"
                               href="/frequently_asked_questions">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="/contacts">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

@if (session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
@endif

@yield('content')

<div class="container-fluid mt-5" style="background-color: #010035; margin-top: auto;">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="d-flex justify-content-center">
                <div class="footer-content">
                    <img src="{{ asset('template_assets/images/mst-logo-min.png') }}"
                         class="pt-3 footer-logo"
                         alt="">
                    @if ($campus)
                        @foreach ($campus as $c)
                            <p class="text-white ms-3 mt-2">{{ $c->name }} - {{ $c->phones[0]->number }}</p>
                        @endforeach
                    @endif
                    @if ($email)
                        <p class="text-white ms-3 pb-2">Email Address - {{ $email }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="d-flex justify-content-center">
                <div>
                    <p class="text-white mt-4 ms-4"
                       style="font-size: 25px; font-family: 'Cormorant Garamond', serif; font-weight: 900;">
                        Useful Links</p>
                    <ul style="list-style-type: none;" class="link-list">
                        <li class="text-white mb-4"> > <a href="index.html">Home</a></li>
                        <li class="text-white mb-4"> > <a
                                href="academics.html">Programmes</a></li>
                        <li class="text-white mb-4"> > <a href="lecturer.html">Faculty</a>
                        </li>
                        <li class="text-white mb-4"> > <a href="events.html">Events</a></li>
                        <li class="text-white mb-4"> > <a href="faq.html">FAQ</a></li>
                        <li class="text-white mb-4"> > <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <p class="text-white text-center pb-3 m-0">Copyright &copy; 2023 by BigTech
            International. All rights
            reserved!</p>
    </div>
</div>

<!-- custom js -->
<script src="{{ asset('template_assets/script.js') }}"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- owl carousel min js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
</body>

</html>
