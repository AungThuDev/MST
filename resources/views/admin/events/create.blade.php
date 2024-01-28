@extends('layouts.master')
@section('event', 'nav-link nav-link active')
@section('title', 'Admin - Events')
@section('content')
    <h1 class="text-center">Create An Event</h1>
    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <form action="{{ route('admin.event.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Event Title<span style="color: red">*</span></label>
                        <input id="title" type="text" class="form-control" value="{{ old('title') }}" name="title">
                        @error('title')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Event Description<span style="color: red">*</span></label>
                        <textarea id="description" name="description"
                                  class="form-control" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Featured Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="featured_image" accept="image/*">
                        @error('featured_image')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 1 <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="content_image1" accept="image/*">
                        @error('content_image1')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 2 <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="content_image2" accept="image/*">
                        @error('content_image2')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-success float-right">Create</button>
            </div>

        </div>
    </form>
@endsection
