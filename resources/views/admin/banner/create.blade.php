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
    <form action="{{ route('admin.banner.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {{-- <label for="page_type">Page Type<span style="color: red">*</span></label>
                        <input id="page_type" type="text" class="form-control" name="page_type"
                            value="{{ old('page_type') }}">
                        @error('page_type')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror --}}
                        <label for="page_type">Page Type<span style="color: red">*</span></label>
                        <select class="page-selector" name="page_type">
                            <option value="">-Select Page Name</option>
                            <option value="home">Home</option>
                            <option value="programme">Programme</option>
                            <option value="faculty">Faculty</option>
                            <option value="events">Events</option>
                            <option value="faq">FAQ</option>
                            <option value="contact">Contact</option>
                        </select>
                        @error('page_type')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Page Banner<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="page_banner">
                        @error('page_banner')
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

@section('script')
    <script>
        $(document).ready(function() {
            $('.page-selector').select2();
        });
    </script>
@endsection
