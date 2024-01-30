@extends('layouts.layout')

@section('style')
    <style>
        .index-banner {
            background-image: url({{ '/banners/' . $home_banner->image }});
        }
    </style>
@endsection

@section('content')
    <div class="relative-container index-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="banner-heading">M.S.T UNIVERSITY</h2>
        </div>
    </div>

    <div class="row d-flex align-items-center" style="background-color: rgba(53, 49, 127); color: white; margin: 0;">

        <div class="col-lg-4 col-md-6 col-sm-12 col-12 ps-lg-5 ps-md-0 ps-sm-0 ps-2">
            <div class="p-3">
                <h2 class="vision-heading mt-3">Our Vision</h2>
                <p class="vision-text">To be a globally renowned and sustainable university of excellence in technology
                    education, empowering
                    students to become skilled professionals, driving industry growth and ensuring long-term academic
                    legacy.
                </p>
            </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-flex justify-content-center">
            <div class="p-3">
                <h2 class="vision-heading mt-3">Our Mission</h2>
                <p class="mission-text">
                    Quality education at international standards, leveraging IT industrial education for transformative
                    learning while empowering students' careers and enriching the education.
                </p>
            </div>

        </div>
        <div class="col-lg-4 col-md-6 d-lg-flex d-md-none d-none">
            <div class="p-3" style="width: 100%;">
                <img src="{{ asset('template_assets/images/mst-logo-min.png') }}" style="max-width: 370px; margin: auto;"
                    alt="">
            </div>
        </div>
    </div>


    <div class="about-us container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-4 d-lg-block d-md-none d-sm-none d-none">
                <div class="row d-flex justify-content-end">
                    <div class="image1 col-lg-6">
                        <img src="images/whychhoseus.jpg" class="rounded" alt="">
                    </div>
                    <div class="image2 col-lg-6">
                        <img src="images/whychooseus-2.jpg" class="rounded" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <h2 class="small-heading  aboutus" style="color: #36348E;">ABOUT M.S.T UNIVERSITY</h2>
                <h2 class="heading">Executive Summary of M.S.T</h2>
                <p style="line-height: 29px; font-size: 17px;">Established in 1911 during British colonial rule in Myanmar,
                    B.S.C College, now the New Generation of B.S.C College, initially operated as Burma National College.
                    For over a century, M.S.T University has played a pivotal role in shaping Myanmar's professionals,
                    particularly in the government sector since the nation's independence in 1948. Established in 2005 by
                    Principal U Aung Zaw Myint, a distinguished graduate in Telecommunications and IT Technology from India,
                    M.S.T University has become a leader in IT education and certification in Myanmar. Initially offering
                    local certification programs in Yangon, the university has expanded its reach to regions like Kachin,
                    Mandalay, Pyay, and Mawlamyine, introducing applied subjects, software engineering courses, and
                    technical programs. M.S.T has not only excelled in providing cutting-edge education but has actively
                    contributed to the growth of the IT industry in Myanmar. Beyond traditional classrooms, M.S.T has
                    engaged in public awareness campaigns, workshops, and training programs in collaboration with government
                    bodies and Special Interest Groups, empowering aspiring IT professionals nationwide.


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

                    In its pursuit of excellence, M.S.T University has fostered fruitful collaborations with professionals
                    from around the world. The university has hosted workshops and invited experts from countries such as
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
                        <img class="valuable-img" src="images/success-min.png" style="width: 100%; object-fit:cover;"
                            alt="uni image">
                    </div>
                </div>
                <div class="row g-0 text-center">
                    <div class="col-lg-6 col-md-6 order-lg-2 order-md-2 order-sm-last order-last">
                        <img class="valuable-img" src="images/destination-min.png" style="width: 100%; object-fit:cover;"
                            alt="uni image">
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
                <img src="images/oneofthe.jpg" class="img-fluid" style="max-height: 700px;" alt="">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="largest-paragraph p-5 d-flex flex-column">
                    <div>
                        <h2 class="small-heading"><span style="font-size: 14px !important;">M.S.T UNIVERSITY</span></h2>
                        <h2 class="heading"><span style="font-size: 30px !important; font-weight: bolder;">We Are Emerging
                                As One Of
                                The Largest Universities In Myanmar</span></h2>
                        <p class="mt-4" style="line-height: 35px; font-size: 16px;">Welcome to our prestigious
                            institution, a cornerstone of higher education in Myanmar. Our university stands proudly as
                            one of the largest and most esteemed educational establishments in the country. Since its
                            inception, our commitment to academic excellence, innovation, and holistic development has
                            set us apart. We take pride in fostering a dynamic learning environment that empowers
                            students to thrive intellectually, personally, and professionally. With a dedicated faculty,
                            state-of-the-art facilities, and a comprehensive range of programs, we aim to inspire and
                            equip the next generation of leaders and contributors to society. Join us on a
                            transformative journey of knowledge, growth, and success at M.S.T University.

                        </p>
                    </div>

                    <div class="mt-2">
                        <p style="font-family: 'Cormorant Garamond', serif; font-size: 25px; font-weight: bold;">According
                            to our students' evaluation forms,</p>
                    </div>

                    <div>



                        <h2 class="largest-heading mt-3">Students Skill<span class="percentage float-end">96%</span>
                        </h2>
                        <div class="progress" style="height: 4px; width: 100%;">
                            <div class="progress-bar" role="progressbar" style="width: 96%; background-color: #ffc53a;"
                                aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>

                        </div>

                        <h2 class="largest-heading mt-3">Campus Extracurricular<span class="percentage float-end">87%</span>
                        </h2>
                        <div class="progress" style="height: 4px; width: 100%;">
                            <div class="progress-bar" role="progressbar" style="width: 87%; background-color: #ffc53a;"
                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h2 class="largest-heading mt-3">Quality Of Lecturers<span class="percentage float-end">92%</span>
                        </h2>
                        <div class="progress" style="height: 4px; width: 100%;">
                            <div class="progress-bar" role="progressbar" style="width: 92%; background-color: #ffc53a;"
                                aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="card course-card shadow rounded" style="width: 18rem;">
                        <img src="./images/ncc-min.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title mb-2 course-title">NCC Diplomas</h5>
                            <a href="#" onclick="navigateToPage('academics.html#dp')" class="btn btn-primary"
                                style="background-color: #36348E;">More</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="card course-card shadow rounded" style="width: 18rem;">
                        <img src="./images/2-min.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title mb-2 course-title">ITPEC</h5>
                            <a href="#" onclick="navigateToPage('academics.html#cf')" class="btn btn-primary"
                                style="background-color: #36348E;">More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="card course-card shadow rounded" style="width: 18rem;">
                        <img src="./images/top up degree-min.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title mb-2 course-title">Top-Up Degrees</h5>
                            <a href="#" onclick="navigateToPage('academics.html#ug')" class="btn btn-primary"
                                style="background-color: #36348E;">More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex justify-content-center">
                    <div class="card course-card shadow rounded" style="width: 18rem;">
                        <img src="./images/short courses-min.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title mb-2 course-title">Short Courses</h5>
                            <a href="#" onclick="navigateToPage('academics.html#sc')" class="btn btn-primary"
                                style="background-color: #36348E;">More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- principal message -->
    <div class="container-fluid p-5 mt-5" style="background-color: #f3f3f3; margin: 0 auto;">
        <h2 class="small-heading text-center" style="color: #36348E;">MESSAGE</h2>
        <h2 class="heading text-center mb-5">Our Principal's Message</h2>
        <div class="row d-flex align-items-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="d-flex justify-content-end">
                    <img src="./images/sir-azm-min.jpg" class="img-fluid" style="width: 400px; border-radius: 7px;"
                        alt="">
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex justify-content-start">
                    <div>
                        <div class="quote-container" style="background-color: #f3f3f3;">
                            <p class="quote-text fs-lg-2 fs-md-3 fs-sm-2 fs-2">“We are not just an academic institution;
                                we are a tight-knit community - a diverse, inclusive, and vibrant family.”
                            </p>
                            <div class="quote-text fs-4 text-end me-4 mt-3">Aung Zaw Myint</div>
                            <div class="quote-text fs-5 text-end">Principal of M.S.T University</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partners -->
    <div class="container-fluid mt-5">
        <h2 class="small-heading text-center" style="color: #36348E;">ASSOCIATES</h2>
        <h2 class="heading text-center">Our Partners</h2>

        <div class="row p-5 d-flex align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/ec council.jpg" class="img-fluid" style="max-width: 220px;" alt="">
                </div>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">

                <div class="d-flex justify-content-center">
                    <img src="./images/itpec logo-02-cropped-min.png" class="img-fluid itpec-logo"
                        style="max-width: 220px;" alt="">
                </div>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/Lincoln University College-min.png" class="img-fluid" style="max-width: 220px;"
                        alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/NCCEdu_Logo_2020_RGB_Dark Blue_Horizontal-01-min.png" class="img-fluid"
                        style="max-width: 220px;" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/SQA-International (1)-min.png" class="img-fluid" style="max-width: 220px;"
                        alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/UCLan-University-of-Central-Lancashire update-min.png" class="img-fluid"
                        style="max-width: 220px;" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/Logo-min.png" class="img-fluid" style="max-width: 220px;" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-center">
                    <img src="./images/cass-2.png" class="img-fluid" style="max-width: 150px;" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
