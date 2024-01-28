@extends('layouts.master')
@section('event', 'nav-link nav-link active')
@section('content')
    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <form action="{{ route('admin.event.update', $event->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf

        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Event Title<span style="color: red">*</span></label>
                        <input id="title" type="text" class="form-control" value="{{ old('title') ?? $event->title }}"
                               name="title">
                        @error('title')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Event Description<span style="color: red">*</span></label>
                        <textarea id="description" name="description"
                                  class="form-control">{{ old('description') ?? $event->description }}</textarea>
                        @error('description')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="">Featured Image <span class="text-gray">(Optional)</span></label>
                        <img src="{{ url('/events/' . $event->featured_image) }}" style="width: 100px"
                             class="img-thumbnail"
                             alt="">
                        <input type="file" class="form-control mt-2" name="featured_image">
                        @error('featured_image')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="">Content Image 1 <span class="text-gray">(Optional)</span></label>
                        @if($event->content_image1)
                            <img src="{{ url('/events/' . $event->content_image1) }}" style="width: 100px"
                                 class="img-thumbnail"
                                 alt="">
                        @endif
                        <input type="file" class="form-control mt-2" name="content_image1">
                        @error('content_image1')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 2 <span class="text-gray">(Optional)</span></label>
                        @if($event->content_image2)
                            <img src="{{ url('/events/' . $event->content_image2) }}" style="width: 100px"
                                 class="img-thumbnail" alt="">
                        @endif
                        <input type="file" class="form-control" name="content_image2">
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
