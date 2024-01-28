@extends('layouts.master')

@section('event', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.event.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <form action="{{ route('admin.event.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Event Title<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ old('title') }}" name="title">
                        @error('title')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Event Description<span style="color: red">*</span></label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Featured Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="featured_image">
                        @error('featured_image')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 1 <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="content_image1">
                        @error('content_image1')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Content Image 2 <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="content_image2">
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
