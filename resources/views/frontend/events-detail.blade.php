@extends('layouts.layout')

@section('title', $event->title)

@section('style')
    @if ($event_banner)
        <style>
            .event-banner {
                background-image: url({{ '/banners/' . $event_banner->image }});
            }
        </style>
    @endif
@endsection

@section('content')
    @if ($event)
        <div class="relative-container event-banner">
            <div class="banner-text text-white container-fluid text-start" style="max-width: fit-content;">
                <h2 class="small-heading">M.S.T University</h2>
                <h2 class="banner-heading">{{ $event->title }}</h2>
            </div>
        </div>
        <main style="max-width: 1300px; margin: 0 auto; padding: 55px 30px; line-height: 30px;">
            <div class="row g-5">
                <section class="col-12 col-md-12 col-lg-8">
                    <img src="{{ url('/events/' . $event->featured_image) }}" class="img-fluid" alt=""
                        style="width: 100%; border-radius: 15px;">
                    <h4 class="mt-4 lh-base">{{ $event->title }}</span></h4>
                    <div class="row g-4 mt-2">
                        @if ($event->content_image1 && $event->content_image2)
                            <div class="col-6">
                                <img src="{{ url('/events/' . $event->content_image1) }}" alt="event-1"
                                    style="height: 100%; max-height: 300px; border-radius: 10px;">
                            </div>
                            <div class="col-6">
                                <img src="{{ url('/events/' . $event->content_image2) }}" alt="event-2"
                                    style="height: 100%; max-height: 300px; border-radius: 10px;">
                            </div>
                        @elseif($event->content_image1 && !$event->content_image2)
                            <div class="col-12">
                                <img src="{{ url('/events/' . $event->content_image1) }}" alt="event-1"
                                    style="height: 100%; max-height: 300px; border-radius: 10px;">
                            </div>
                        @elseif(!$event->content_image1 && $event->content_image2)
                            <div class="col-12">
                                <img src="{{ url('/events/' . $event->content_image2) }}" alt="event-1"
                                    style="height: 100%; max-height: 300px; border-radius: 10px;">
                            </div>
                        @endif
                    </div>
                    <h5 style="text-align: justify;word-spacing: 2px;letter-spacing: 1px; line-height: 28px">
                        {!! nl2br($event->description) !!}
                    </h5>
                </section>
    @endif
    <section class="col-12 col-md-12 col-lg-4" style="max-width: 500px;">
        <h4 class="fw-bold">RECENT EVENTS</h4>
        @if ($events)
            @foreach ($events as $event)
                <article class="row mt-4">
                    <div class="col-5">
                        <img src="{{ url('/events/' . $event->featured_image) }}" alt="recent-event-1"
                            style="width: 100%; height: 100px; border-radius: 8px;">
                    </div>
                    <div class="col-7">
                        <h5 class="fw-bold"><a href="{{ route('frontend.event.detail', $event->id) }}"
                                style="text-decoration: none; color: black; font-size: 18px;">{{ $event->title }}</a>
                        </h5>
                    </div>
                </article>
            @endforeach
        @endif
    </section>
    </div>
    </main>
@endsection
