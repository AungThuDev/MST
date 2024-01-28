@extends('layouts.master')

@section('banner', 'nav-link nav-link active')

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
                        <label for="">Page Type<span style="color: red">*</span></label>
                        <input type="text" value="{{ old('page_type') ?? $banner->page }}" class="form-control"
                            name="page_type">
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
