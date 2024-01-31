@extends('layouts.layout')
@section('title', 'Programmes')
@section('style')
    <style>
        .programmes-banner {
            background-image: url('{{ '/banners/' . $programmes_banner->image }}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .image {
            background-image: url('{{ '/programme_page/' . $programmePage->image }}'),
            linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
            background-size: cover;
            background-position: right;
            background-attachment: fixed;
            height: 500px;
            position: relative;
        }
    </style>
@endsection
@section('content')
    <div class="relative-container programmes-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="banner-heading">PROGRAMMES</h2>
        </div>
    </div>
    <!-- academic items -->
    <section id="pg"></section>
    <div>
        <h2 class="small-heading text-center mt-5" style="color: #36348E;">OUR PROGRAMMES</h2>
    </div>
    <div class="container-fluid programme-container mt-5">
        @foreach($categories as $category)
            @if(count($category->programmes) > 0)
                <h2 class="programme-header">{{ $category->name }}</h2>
                @foreach($category->programmes as $programme)
                    <div>
                        <img src="{{ asset('/programmes/' . $programme->image) }}" class="img-fluid mt-5"
                             style="max-width: 250px;" alt="programme-image">
                        <h2 class="programme-name mt-3">{{ $programme->name }}</h2>
                        <p class="programme-text mt-3">{{ $programme->description }}</p>
                        <p class="programme-text">{{ $programme->duration }}<a
                                href="{{ $programme->link }}" target="_blank"
                                class="btn btn-primary float-end" style="background-color: #36348E;">Course Info</a>
                        </p>
                        <hr class="mt-5" style="border: 1px solid #0c0ab1;">
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>

    <div class="image mt-5">
        <div class="counter">
            <div class="row">
                <div class="rounded p-4 d-flex bg-white">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-center">
                                <div class="counter-item me-5 ms-5">
                                    <h1 class="d-flex">{{ $programmePage->courses }}
                                        <i class="fa fa-plus counter-icon"></i>
                                    </h1>
                                    <p>Courses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-center">
                                <div class="counter-item me-5 ms-5">
                                    <h1>{{ $programmePage->classes }}</h1>
                                    <p>Classes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-center">
                                <div class="counter-item me-5 ms-5">
                                    <h1 class="d-flex">{{ $programmePage->students }}
                                        <i class="fa fa-plus counter-icon"></i>
                                    </h1>
                                    <p>Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-center">
                                <div class="counter-item me-5 ms-5">
                                    <h1 class="d-flex">{{ $programmePage->diplomas }}
                                        <i class="fa fa-plus counter-icon"></i>
                                    </h1>
                                    <p>Diploma</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div>
            <h2 class="small-heading text-center mt-5" style="color: #36348E;">OUR PARTNERS</h2>
            <h2 class="heading text-center">Our Partners' View</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/NCCEdu_Logo_2020_RGB_Dark Blue_Horizontal-01-min.png"
                            style="width: 250px; height: 80px;" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">NCC Education</h5>
                        <div style="width: 100%;">
                            <p class="card-text d-flex align-items-center">
                                NCC Education is a global provider of British
                                education, offering a range of qualifications and programs in partnership with
                                universities and colleges worldwide. Our collaboration with NCC Education enhances
                                the
                                academic pathways and opportunities available to our students.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/itpec logo-02-cropped-min.png" style="width: 250px; height: 90px;"
                            class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">
                            ITPEC
                        </h5>
                        <p class="card-text">
                            As a partner of ITPEC, we align ourselves with a council dedicated to
                            promoting and standardizing IT professionalism in the Asia-Pacific region. This
                            collaboration ensures that our students are well-prepared and recognized for their
                            proficiency in the field of information technology.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/UCLan-University-of-Central-Lancashire update-min.png"
                            style="width: 250px; height: 80px;" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">University of Central Lancashire (UCLan)</h5>
                        <p class="card-text">
                            Our partnership with UCLan, a leading UK university, opens doors to a
                            wealth of academic resources and collaborative initiatives. Together, we work towards
                            providing an internationally recognized education that prepares students for success in
                            their chosen fields.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/UCLan-University-of-Central-Lancashire update-01-min.png"
                            style="width: 250px; height: 80px;" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">EC-Council</h5>
                        <p class="card-text">
                            Partnering with EC-Council, a leader in cybersecurity education,
                            strengthens our commitment to providing cutting-edge training and certifications in
                            cybersecurity. Our collaboration ensures that students receive industry-relevant
                            knowledge
                            and skills.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/Lincoln University College-min.png" style="width: 250px; height: 80px;"
                            class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">Lincoln University Malaysia</h5>
                        <p class="card-text">
                            Collaborating with Lincoln University Malaysia allows us to offer a
                            diverse and globally relevant educational experience. This partnership contributes to
                            the
                            internationalization of our programs and fosters cultural exchange within the academic
                            community.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;">
                        <img src="./images/Logo-min.png" style="width: 250px; height: 80px;" class="card-img-top"
                             alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">NCFE UK (Northern Council for Further Education)
                        </h5>
                        <p class="card-text">
                            NCFE UK is a reputed awarding organization, and our partnership ensures
                            that our academic programs adhere to high-quality standards. This collaboration enhances
                            the
                            credibility of our qualifications and aligns them with industry needs.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/SQA-International (1)-cropped-min.png" style="width: 250px; height: 80px;"
                            class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">SQA (Scottish Qualifications Authority)</h5>
                        <p class="card-text">
                            SQA is a trusted accreditation body, and our partnership ensures that our
                            academic programs meet rigorous quality standards. This collaboration enhances the
                            recognition and transferability of our qualifications.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/cass-2.png" style="width: 150px;" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">CASS Europe</h5>
                        <p class="card-text">
                            Collaborating with CASS Europe contributes to our commitment to providing
                            a comprehensive business education. This partnership fosters academic excellence and
                            global
                            perspectives, preparing students for leadership roles in the dynamic world of business.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="height: 400px;">
                <div class="card p-3 rounded" style="height: 390px;">
                    <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                            src="./images/ec council-cropped.jpg" style="width: 250px; height: 80px;"
                            class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title partner-view-title">EC-Council University</h5>
                        <p class="card-text">
                            Our collaboration with EC-Council University extends our commitment to
                            cybersecurity education. This partnership facilitates academic programs that prepare
                            students for leadership roles in the cybersecurity industry, fostering innovation and
                            expertise.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5" style="width: 95%; max-width: 1000px;">
        <div class="text-center mb-5">
            <h2 class="small-heading" style="color: #36348E;">LETS JOIN AND PROVE IT</h2>
            <h2 class="heading">Recent Awards</h2>
            <p class="">M.S.T University, recognized for academic excellence, has earned accredited partner
                awards from international institutions, emphasizing its commitment to quality education.
                The university's dedication is further exemplified by students consistently achieving
                global recognition through annual top scorer awards. These accomplishments underscore
                M.S.T University's commitment to cultivating a vibrant learning environment, enabling
                student success on both national and international fronts and establishing itself as a
                premier institution of higher education.
            </p>
        </div>
        <div
            class="card mb-4 p-3 m d-flex flex-column flex-md-row flex-lg-row justify-content-between align-items-center">
            <div class="me-3 order-2 order-md-1 order-lg-1 mt-3 mt-md-0 mt-lg-0">
                <h4>
                    <i class="fa-solid fa-trophy"></i>ASOCIO
                </h4>
                <p>
                    Receiving the ASOCIO EdTech Award 2023 reaffirms our mission and motivates us to
                    continue pushing the boundaries of what's possible in education technology. ASOCIO
                    EdTech Award is recognized as an outstanding award in digital talent training, work
                    and study programs, technology courseware design, development and training
                    methodologies focusing on Blockchain, IoT, AI, Robotics, Big Data, Cybersecurity &
                    Cloud based solutions.
                </p>
            </div>
            <div class="order-1 order-md-1 order-lg-2">
                <img src="images/Asocio-min.jpg" class="img-fluid rounded" alt="" style="width: 800px;">
            </div>
        </div>
        <div
            class="card mb-4 p-3 d-flex flex-column flex-md-row flex-lg-row justify-content-between align-items-center">
            <div class="">
                <img src="./images/pusu futsal cropped.jpg" class="img-fluid rounded" alt="" style="width: 800px;">
            </div>
            <div class="ms-3 mt-3 mt-md-0 mt-lg-0">
                <h4>
                    <i class="fa-solid fa-trophy"></i>Sports Awards
                </h4>
                <p>
                    Exceptional students excelled in the PUSU Futsal Tournament 2023, securing 1st
                    runner-up, Most Valuable Player, Best Goalkeeper, and Best Audience awards. Their
                    success extended to the E-Sports Tournament 2023, where they claimed the 1st
                    runner-up position, showcasing both individual skills and collective dedication in
                    futsal and eSports.
                </p>
            </div>
        </div>
        <div class="card p-3 d-flex flex-column flex-md-row flex-lg-row justify-content-between align-items-center">
            <div class="me-3 order-2 order-md-1 order-lg-1 mt-3 mt-md-0 mt-lg-0">
                <h4>
                    <i class="fa-solid fa-trophy"></i>Other Awards
                </h4>
                <p>
                    M.S.T University has earned accredited partner awards from renowned international institutions,
                    reinforcing its dedication to academic excellence. Additionally, our students consistently achieve
                    global recognition with annual top scorer awards, highlighting the university's commitment to
                    providing quality education and fostering an environment conducive to students' success.
                </p>
            </div>
            <div class="order-1 order-md-2 order-lg-2">
                <img src="images/ASOCIO1-min.jpg" class="img-fluid rounded" alt="" style="width: 800px;">
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- owl carousel init -->
    <script>
        $(document).ready(function () {
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
