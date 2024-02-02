@extends('layouts.layout')

@section('title', 'Home')

@section('style')
    @if ($home_banner)
        <style>
            .index-banner {
                background-image: url({{ '/banners/' . $home_banner->image }});
            }
        </style>
    @endif
@endsection

@section('content')
    <div class="relative-container index-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="banner-heading">M.S.T UNIVERSITY</h2>
        </div>
    </div>
    @if ($home)
        <div class="row d-flex align-items-center" style="background-color: rgba(53, 49, 127); color: white; margin: 0;">

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 ps-lg-5 ps-md-0 ps-sm-0 ps-2">
                <div class="p-3">
                    <h2 class="vision-heading mt-3">Our Vision</h2>
                    <p class="vision-text">{{ $home->vision }}
                    </p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex justify-content-center">
                <div class="p-3">
                    <h2 class="vision-heading mt-3">Our Mission</h2>
                    <p class="mission-text">
                        {{ $home->mission }}
                    </p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 d-lg-flex d-md-none d-none">
                <div class="p-3" style="width: 100%;">
                    <img src="{{ asset('template_assets/images/mst-logo-min.png') }}"
                        style="max-width: 370px; margin: auto;" alt="">
                </div>
            </div>
        </div>


        <div class="about-us container-fluid">
            <div class="row">
                <div class="col-lg-6 mt-4 d-lg-block d-md-none d-sm-none d-none">
                    <div class="row d-flex justify-content-end">
                        <div class="image1 col-lg-6">
                            <img src="{{ url('/homepage/' . $home->about_image1) }}" class="rounded" alt="">
                        </div>
                        <div class="image2 col-lg-6">
                            <img src="{{ url('/homepage/' . $home->about_image2) }}" class="rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <h2 class="small-heading  aboutus" style="color: #36348E;">ABOUT M.S.T UNIVERSITY</h2>
                    <h2 class="heading">{{ $home->about_title }}</h2>
                    <p style="line-height: 29px; font-size: 17px;">{{ $home->about_text }}


                    </p>
                </div>
            </div>
        </div>

        <div class="knowledge container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-first order-md-last order-sm-last order-last">
                    <h2 class="small-heading mt-lg-0 mt-md-5 mt-sm-5 mt-5" style="color: #36348E;">TO THE JOURNEY AHEAD</h2>
                    <h2 class="heading">Global Collaborations</h2>
                    <div style="line-height: 29px;">

                        In its pursuit of excellence, M.S.T University has fostered fruitful collaborations with
                        professionals
                        from around the world. The university has hosted workshops and invited experts from countries such
                        as
                        Indonesia and Thailand, facilitating knowledge exchange and promoting international best practices.
                        These collaborations, ranging from an ICT Computer Centre to the university level, have helped M.S.T
                        maintain its status as a premier institution for developing future IT professionals in Myanmar.

                    </div>
                    <h2 class="heading mt-4">Supporting Student Success</h2>
                    <div style="line-height: 29px;">

                        M.S.T University is dedicated not only to providing quality education but also to ensuring that no
                        deserving student is hindered by financial constraints. We have established yearly scholarships and
                        financial aid programs to support students in need, empowering them to pursue their dreams and make
                        meaningful contributions to the IT industry. Through the creation of equal opportunities for all,
                        M.S.T University exemplifies its commitment to cultivating a talented and diverse pool of IT
                        professionals.
                    </div>
                </div>
                <div
                    class="applyconnect col-lg-6 col-md-12 col-sm-12 col-12 mt-lg-0 mt-sm-4 mt-4 order-lg-last order-md-first order-sm-first order-first">
                    <div class="row g-0 text-center">
                        <div
                            class="col-lg-6 col-md-6 knowledge-letter-apply order-lg-first order-md-first order-first d-flex align-items-center justify-content-center">
                            <div>
                                <h2 class="knowledge-heading">YOUR <br> SUCCESS</h2>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-sm-1">
                            <img class="valuable-img" src="{{ url('/homepage/' . $home->journey_image1) }}"
                                style="width: 100%; object-fit:cover;" alt="uni image">
                        </div>
                    </div>
                    <div class="row g-0 text-center">
                        <div class="col-lg-6 col-md-6 order-lg-2 order-md-2 order-sm-last order-last">
                            <img class="valuable-img" src="{{ url('/homepage/' . $home->journey_image2) }}"
                                style="width: 100%; object-fit:cover;" alt="uni image">
                        </div>
                        <div
                            class="col-lg-6 col-md-6 order-lg-3 order-md-3 order-sm-2 order-2 knowledge-letter-connect d-flex align-items-center justify-content-center">
                            <div>
                                <h2 class="knowledge-heading">OUR <br> DESTINATION</h2>
                            </div>



                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div class="largest mt-5">
            <div class="row g-0">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <img src="{{ url('/homepage/' . $home->eval_image) }}" class="img-fluid" style="max-height: 700px;"
                        alt="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="largest-paragraph p-5 d-flex flex-column">
                        <div>
                            <h2 class="small-heading"><span style="font-size: 14px !important;">M.S.T UNIVERSITY</span></h2>
                            <h2 class="heading"><span
                                    style="font-size: 30px !important; font-weight: bolder;">{{ $home->eval_title }}</span>
                            </h2>
                            <p class="mt-4" style="line-height: 35px; font-size: 16px;">{{ $home->eval_text }}

                            </p>
                        </div>

                        <div class="mt-2">
                            <p style="font-family: 'Cormorant Garamond', serif; font-size: 25px; font-weight: bold;">
                                According
                                to our students' evaluation forms,</p>
                        </div>

                        <div>



                            <h2 class="largest-heading mt-3">{{ ucwords($home->progress1) }}<span
                                    class="percentage float-end">{{ $home->progress1_percent }}%</span>
                            </h2>
                            <div class="progress" style="height: 4px; width: 100%;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $home->progress1_percent }}%; background-color: #ffc53a;"
                                    aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>

                            <h2 class="largest-heading mt-3">{{ ucwords($home->progress2) }}<span
                                    class="percentage float-end">{{ $home->progress2_percent }}%</span>
                            </h2>
                            <div class="progress" style="height: 4px; width: 100%;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $home->progress2_percent }}%; background-color: #ffc53a;"
                                    aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h2 class="largest-heading mt-3">{{ ucwords($home->progress3) }}<span
                                    class="percentage float-end">{{ $home->progress3_percent }}%</span>
                            </h2>
                            <div class="progress" style="height: 4px; width: 100%;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $home->progress3_percent }}%; background-color: #ffc53a;"
                                    aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- courses -->
    <div class="course container">
        <div class="course-title mt-5 p-5 text-center">
            <h2 class="small-heading" style="color: #36348E;">Expanding Reach and Programs</h2>
            <h2 class="heading">COURSES AND CLASSES
            </h2>
            <p class="mt-3"
                style="font-family: 'Poppins', sans-serif; font-size: 17px; text-align: start;line-height: 28px;">From its
                inception, M.S.T University has been at the forefront of offering comprehensive education programs. While
                initially focusing on Local Certification Programs in Yangon, M.S.T quickly expanded its footprint by
                introducing applied subjects, software engineering courses, and technical programs in regions like Kachin,
                Mandalay, Pyay, and Mawlamyine. Moreover, M.S.T's commitment to knowledge dissemination and skill
                development extended beyond traditional classroom settings. M.S.T lecturers, in collaboration with
                government bodies and Special Interest Groups (SIGs), conducted public awareness campaigns, workshops, and
                training programs, thus empowering aspiring IT professionals throughout the country.
            </p>
        </div>
        <div class="owl-carousel owl-theme">
            @if ($categories)
                @foreach ($categories as $category)
                    <div class="item" style="height: 480px; width: 360px">
                        <div class="card course-card shadow rounded">
                            <img src="{{ url('/categories/' . $category->image) }}" style="width: 100%; height: 300px"
                                class="card-img-top" alt="...">

                            <div class="card-body">
                                <h5 class="card-title course-title">{{ $category->name }}</h5>
                                <div style="width: 100%;">
                                    <a href="#" onclick="navigateToPage('academics.html#dp')"
                                        class="btn btn-primary" style="background-color: #36348E;">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- principal message -->
    <div class="container-fluid p-5 mt-5" style="background-color: #f3f3f3; margin: 0 auto;">
        <h2 class="small-heading text-center" style="color: #36348E;">MESSAGE</h2>
        <h2 class="heading text-center mb-5">Our Principal's Message</h2>
        @if ($principal)
            <div class="row d-flex align-items-center">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="d-flex justify-content-end">
                        <img src="{{ url('/principal/' . $principal->home_image) }}" class="img-fluid"
                            style="width: 400px; border-radius: 7px;" alt="">
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex justify-content-start">
                        <div>
                            <div class="quote-container" style="background-color: #f3f3f3;">
                                <p class="quote-text fs-lg-2 fs-md-3 fs-sm-2 fs-2" style="text-align: justify">
                                    {{ $principal->message }}
                                </p>
                                <div class="quote-text fs-4 text-end me-4 mt-3">{{ $principal->name }}</div>
                                <div class="quote-text fs-5 text-end">Principal of M.S.T University</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- partners -->
    <div class="container-fluid mt-5">
        <h2 class="small-heading text-center" style="color: #36348E;">ASSOCIATES</h2>
        <h2 class="heading text-center">Our Partners</h2>

        <div class="row p-5 d-flex align-items-center">
            @if ($partners && count($partners) <= 8)
                @foreach ($partners as $partner)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="d-flex justify-content-center">
                            <img src="{{ url('/partner/' . $partner) }}" class="img-fluid" style="max-width: 200px;"
                                alt="">
                        </div>

                    </div>
                @endforeach
            @elseif($partners && count($partners) > 8)
                @foreach ($partners as $partner)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="d-flex justify-content-center">
                            <img src="{{ url('/partner/' . $partner) }}" class="img-fluid" style="max-width: 200px;"
                                alt="">
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('script')
    <!-- owl carousel init -->
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 1000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
            })
        })
    </script>
@endsection
