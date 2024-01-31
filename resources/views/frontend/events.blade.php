@extends('layouts.layout')

@section('title', 'Events')

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

    <div class="relative-container event-banner">
        <div class="banner-text text-white container-fluid text-start">
            <h2 class="small-heading">ACTIVITIES</h2>
            <h2 class="banner-heading">EVENTS</h2>
        </div>
    </div>

    <div class="container-fluid mt-5 p-4" style="background-color: #f3f3f3;">

        <h2 class="small-heading text-center" style="color: #36348E;">ACTIVITIES</h2>
        <h2 class="heading text-center">M.S.T's Events</h2>
        <div class="row g-5 mt-4">
            @if ($events)
                @foreach ($events as $event)
                    <div
                        class="col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center d-flex justify-content-center">
                        <div class="card event-card rounded" style="width: 30rem">
                            <img style="height: 250px" src="{{ url('/events/' . $event->featured_image) }}"
                                class="card-img-top" alt="event-card-image">
                            <div class="card-body">
                                <p class="card-title event-title">{{ $event->title }}
                                </p>
                                <p class="card-text event-text">{{ Str::limit($event->description, 100) }}
                                </p>
                            </div>
                            <div class="p-3 d-flex justify-content-end">
                                <a href="{{ route('frontend.event.detail', $event->id) }}" class="btn rounded text-white"
                                    style="background-color: rgb(53, 49, 127);">Read More</a>
                            </div>

                        </div>
                    </div>
                @endforeach

        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $events->links() }}
        </div>
        @endif
    </div>
@endsection
