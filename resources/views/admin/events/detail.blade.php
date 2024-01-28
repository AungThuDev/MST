@extends('layouts.master')
@section('event', 'nav-link nav-link active')
@section('content')
    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <div class="card p-2">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Event Title<span style="color: red">*</span></label>
                    <input id="title" disabled type="text" class="form-control" value="{{ $event->title }}" name="title">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Event Description<span style="color: red">*</span></label>
                    <textarea id="description" disabled name="description" class="form-control">{{ $event->description }}</textarea>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <label for="">Featured Image<span style="color: red">*</span></label>
                </div>
                <img src="{{ url('/events/' . $event->featured_image) }}" style="width: 150px" class="img-thumbnail"
                     alt="">
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div><label for="">Content Image 1 <span class="text-gray">(Optional)</span></label></div>
                    @if($event->content_image1)
                        <img src="{{ url('/events/' . $event->content_image1) }}" style="width: 150px;"
                             class="img-thumbnail"
                             alt="event image">
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div><label for="">Content Image 2 <span class="text-gray">(Optional)</span></label></div>
                    @if($event->content_image2)
                        <img src="{{ url('/events/' . $event->content_image2) }}" style="width: 150px"
                             class="img-thumbnail"
                             alt="event image">
                    @endif
                </div>
            </div>

        </div>

    </div>

    <div>
        <a class="btn btn-success float-right text-white" href="{{ route('admin.event.edit', $event->id) }}">Edit</a>
    </div>
@endsection
