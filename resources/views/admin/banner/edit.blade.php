@extends('layouts.master')
@section('banner', 'nav-link nav-link active')
@section('title', 'Admin - Banners')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection {
            height: 50px !important;
        }
    </style>
@endsection
@section('content')
    <div>
        <a href="{{ route('admin.banner.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <form action="{{ route('admin.banner.update', $banner->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="page_type">Page Type<span style="color: red">*</span></label>
                        <select class="page-selector" name="page_type" disabled>
                            <option value="">-Select Page Name</option>
                            <option value="home" {{ $banner->page == 'home' ? 'selected' : '' }}>Home</option>
                            <option value="programme" {{ $banner->page == 'programme' ? 'selected' : '' }}>Programme
                            </option>
                            <option value="faculty" {{ $banner->page == 'faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="events" {{ $banner->page == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="faq" {{ $banner->page == 'faq' ? 'selected' : '' }}>FAQ</option>
                            <option value="contact" {{ $banner->page == 'contact' ? 'selected' : '' }}>Contact</option>
                        </select>
                        <input type="hidden" name="page_type" value="{{ $banner->page }}">
                        @error('page_type')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Page Banner <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="page_banner">
                        <img class="img-thumbnail" style="width: 100px" src="{{ url('/banners/' . $banner->image) }}"
                            alt="">
                        @error('page_banner')
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

@section('script')
    <script>
        $(document).ready(function() {
            $('.page-selector').select2();
        });
    </script>
@endsection
