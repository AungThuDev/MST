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
                <div id="{{$category->name}}" style="position: relative; top: -100px;"></div>
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
            @foreach($partners as $partner)
                <div class="item" style="height: 400px;">
                    <div class="card p-3 rounded" style="height: 390px;">
                        <div class="d-flex justify-content-center align-items-center" style="height: 110px;"><img
                                src="{{ asset('/partner/' . $partner->image) }}"
                                style="width: 250px; height: 80px;" class="card-img-top" alt="partner image"></div>
                        <div class="card-body">
                            <h5 class="card-title partner-view-title">{{ $partner->name }}</h5>
                            <div style="width: 100%;">
                                <p class="card-text d-flex align-items-center">{{ $partner->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="awards" class="container-fluid mb-5" style="width: 95%; max-width: 1000px;">
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
        @foreach($awards as $award)
            <div
                class="card mb-3 p-3 d-flex flex-column flex-md-row flex-lg-row justify-content-between align-items-center">
                <div class="{{ $loop->even ? 'order-md-first order-lg-first' : 'order-md-last order-lg-last' }}">
                    <img src="{{ asset('/award/' . $award->image) }}" class="img-fluid rounded" alt="award image" style="width: 800px;">
                </div>
                <div class="px-3 mt-3 mt-md-0 mt-lg-0 {{ $loop->even ? 'order-md-last order-lg-last' : 'order-md-first order-lg-first' }}">
                    <h4>
                        <i class="fa-solid fa-trophy me-2"></i>{{ $award->title }}
                    </h4>
                    <p>{{ $award->description }}</p>
                </div>
            </div>
        @endforeach
        {{ $awards->links() }}
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
