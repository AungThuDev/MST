@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{route('admin.banner.index')}}" class="btn btn-primary float-right mb-2">All Banners</a>
    </div>
    <form action="{{route('admin.banner.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Page Type<span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="page_type">
                        @error('page_type')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Page Banner<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="page_banner">
                        @error('page_banner')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right">Create</button>
            </div>
            
        </div>
    </form>
@endsection