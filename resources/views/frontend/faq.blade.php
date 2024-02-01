@extends('layouts.layout')
@section('title', 'FAQ')
@section('style')
    <style>
        .faq-banner {
            background-image: url('{{ '/banners/' . $faq_banner->image }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('content')
    <div class="relative-container faq-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="small-heading">HELP & QUESTIONS</h2>
            <h2 class="banner-heading">FAQ</h2>
        </div>
    </div>
    <main>
        <section class="row d-flex justify-content-center" style="max-width: 1650px; margin: 50px auto;">
            <section class="col-12 col-lg-6" id="faq">
                <h2 class="small-heading" style="color: #36348e;">FREQUENTLY ASKED QUESTIONS</h2>
                <h2 class="heading">Popular Questions</h2>
                <div class="d-flex flex-column gap-3">
                    @foreach($faqs as $faq)
                        <article>
                            <a onclick="clickQuestion(event)" class="text-black no-underline" data-bs-toggle="collapse"
                               href="#{{ $faq->id }}" role="button" aria-expanded="false"
                               aria-controls="collapseExample">
                                <div class="question d-flex align-items-center gap-4 {{ $loop->first ? 'open' : ''}}">
                                    <i class="fa-solid {{ $loop->first ? 'fa-xmark' : 'fa-plus' }}"></i>
                                    <p>{{$faq->question}}</p>
                                </div>
                            </a>
                            <div class="collapse {{ $loop->first ? 'show' : '' }}" id="{{ $faq->id }}" data-bs-parent="#faq">
                                <p class="px-5 mt-3">{{ $faq->answer }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </section>
        <section class="row d-flex justify-content-center p-2">
            <section class="col-12 col-lg-5 col-md-6 col-sm-6 mt-5 mt-lg-0">
                <h2 class="heading" style="font-weight: bold; font-size: 32px;">Support</h2>
                <p style="font-size: 19px;">"Have any more questions? Don't hesitate to get in touch!"</p>
                <div class="d-flex justify-content-start gap-5">
                    <div class="d-flex justify-content-start gap-3">
                        <i class="fa-solid fa-phone-volume fa-xl pt-3" style="color: #36348e;"></i>
                        <div>
                            <p style="color: #36348e; font-size: 19px;">Contact Us</p>
                            <p>Yangon Campus 1 - 09 422 288 106</p>
                            <p>Yangon Campus 2 - 09 422 288 601</p>
                            <p>Mandalay Campus - 09 979 700 830</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start gap-3">
                        <i class="fa-regular fa-envelope fa-xl pt-3" style="color: #36348e;"></i>
                        <div>
                            <p style="color: #36348e; font-size: 19px;">Email</p>
                            <p>info@mstinstitute.net</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection
