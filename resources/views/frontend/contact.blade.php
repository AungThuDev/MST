@extends('layouts.layout')
@section('title', 'Contact')
@section('style')
    <style>
        .contact-banner {
            background-image: url('{{ '/banners/' . $contact_banner->image }}');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection
@section('content')
    <div class="relative-container contact-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="small-heading">GET IN TOUCH</h2>
            <h2 class="banner-heading">CONTACT</h2>
        </div>
    </div>
    <main>
        <section class="row" style="max-width: 1700px; margin: 50px auto;">
            <section class="col-12 col-lg-6">
                <div class="card shadow border-0">
                    <div class="card-body p-5">
                        <h5 class="card-title cormorant mb-3 fw-bold" style="font-size: 30px;">Leave A Message</h5>
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex justify-content-between gap-3">
                                <input class="form-control p-3" type="text" placeholder="Your Name">
                                <input class="form-control p-3" type="text" placeholder="Subject">
                            </div>
                            <div class="d-flex justify-content-between gap-3">
                                <input class="form-control p-3" type="text" placeholder="Email">
                                <input class="form-control p-3" type="text" placeholder="Phone">
                            </div>
                            <textarea class="form-control" rows="5" placeholder="Your Comment"></textarea>
                            <button class="send-message-btn btn rounded-0 p-3">SEND MESSAGE</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-12 col-lg-6 mb-3 mt-5 mt-lg-0">
                <h2 class="small-heading" style="color: rgb(54, 52, 142);">HAVE MORE QUESTIONS?</h2>
                <h2 class="heading">Feel Free To Contact Us</h2>
                <p class="cormorant fw-bold" style="font-size: 30px;">Email - info@mstinstitute.net</p>

                <div class="row">
                    @foreach($campuses as $camp)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <p class="cormorant fw-bold" style="font-size: 24px;">{{ $camp->name }}</p>
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <div style="height: 80px;">
                                        @foreach($camp->phones()->pluck('number') as $phone)
                                            <p style="margin-bottom: 0;">{{ $phone }}</p>
                                        @endforeach
                                    </div>
                                    <p style="line-height: 25px;">{{ $camp->address }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <p class="cormorant fw-bold" style="font-size: 26px;">Social Media</p>
                    </div>
                </div>
                <div class="d-flex d-lg-flex justify-content-start gap-4 pt-3">
                    <a style="text-decoration: none; color: black;" target="_blank" href="https://www.facebook.com/MyanmarSkillofTechnologies/"><i class="fa-brands fa-facebook-f"></i></a>
                    <a style="text-decoration: none; color: black;" target="_blank" href="https://mm.linkedin.com/company/mstuniversity/"><i class="fa-brands fa-linkedin"></i></a>
                    <a style="text-decoration: none; color: black;" target="_blank" href="https://www.youtube.com/@M.S.TUniversity"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </section>
        </section>
    </main>
    <section>
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.8771111757574!2d96.15591277611097!3d16.78278848400497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed1a1f15fb4f%3A0x2c3fd7b20068780!2sM.S.T%20University!5e0!3m2!1sen!2smm!4v1701405679444!5m2!1sen!2smm"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
