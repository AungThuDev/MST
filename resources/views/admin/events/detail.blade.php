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
                    <label for="">Event Title<span style="color: red">*</span></label>
                    <input disabled type="text" class="form-control" value="{{ $event->title }}" name="title">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Event Description<span style="color: red">*</span></label>
                    <textarea disabled name="description" class="form-control">{{ $event->description }}</textarea>
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
                    <div><label for="">Content Image 1 (Optional)</label></div>
                    <img src="{{ url('/events/' . $event->content_image1) }}" style="width: 150px;" class="img-thumbnail"
                        alt="">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div><label for="">Content Image 2 (Optional)</label></div>
                    <img src="{{ url('/events/' . $event->content_image2) }}" style="width: 150px" class="img-thumbnail"
                        alt="">
                </div>
            </div>

        </div>

    </div>
@endsection
