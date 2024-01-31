@extends('layouts.layout')

@section('title', 'Faculty')


@section('style')
    @if ($faculty_banner)
        <style>
            .lecturer-banner {
                background-image: url({{ '/banners/' . $faculty_banner->image }});
            }
        </style>
    @endif
@endsection

@section('content')
    <div class="relative-container lecturer-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="banner-heading">FACULTY</h2>
        </div>
    </div>

    <div class="container-fluid mt-5">
        @if ($principal)
            <div class="row" style="width: 95%; max-width: 1100px; margin: 0 auto;">
                <div class="col-12 col-md-5 col-lg-5">
                    <img src="{{ url('/principal/' . $principal->faculty_image) }}" style="width: 100%;border-radius: 7px;"
                        alt="principal image">
                </div>
                <div class="col-12 col-md-7 col-lg-7 mt-3 mt-md-0 mt-lg-0">
                    <h2 class="heading">Our Chancellor</h2>
                    <p class="chancellor-paragraph">{{ $principal->faculty_text }}</p>
                </div>
            </div>
        @endif
    </div>

    <div class="container-fluid mt-5">
        <h2 class="heading text-center">Lecturers of M.S.T University</h2>
        <div class="mt-5">
            <div class="row gy-5" style="max-width: 1300px; margin: auto;">
                @if ($lecturers)
                    @foreach ($lecturers as $lecturer)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="d-flex justify-content-center">
                                <div class="card shadow shadow-lg rounded" style="width: 30rem;">
                                    <img src="{{ url('/lecturer/' . $lecturer->image) }}" class="card-img-top"
                                        alt="">
                                    <div class="card-body">
                                        <p class="lect-role">{{ $lecturer->position }}</p>
                                        <h2 class="lect-name">{{ $lecturer->name }}</h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $lecturers->links() }}
        </div>
    </div>
    @endif
@endsection
