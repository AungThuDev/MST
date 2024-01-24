@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-success float-right mb-2">All Events</a>
    </div>
    <form action="{{ route('admin.event.update', $event->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Event Title<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $event->title }}" name="title">
                        @error('title')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Event Description<span style="color: red">*</span></label>
                        <textarea name="description" class="form-control">{{ $event->description }}</textarea>
                        @error('description')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Featured Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="featured_image">
                        <img src="{{ url('/events/' . $event->featured_image) }}" style="width: 100px" class="img-thumbnail"
                            alt="">
                        @error('featured_image')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 1 (Optional)</label>
                        <input type="file" class="form-control" name="content_image1">
                        <img src="{{ url('/events/' . $event->content_image1) }}" style="width: 100px" class="img-thumbnail"
                            alt="">
                        @error('content_image1')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 2 (Optional)</label>
                        <input type="file" class="form-control" name="content_image2">
                        <img src="{{ url('/events/' . $event->content_image2) }}" style="width: 100px"
                            class="img-thumbnail" alt="">
                        @error('content_image2')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </div>

        </div>
    </form>
@endsection
