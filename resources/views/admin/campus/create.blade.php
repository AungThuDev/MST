@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.campus.index') }}" class="btn btn-primary float-right mb-2">All Campus</a>
    </div>
    <form action="{{ route('admin.campus.store') }}" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                        @error('name')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Address<span style="color: red">*</span></label>
                        <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Campus Phone One<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ old('phone_one') }}" name="phone_one">
                        @error('phone_one')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Campus Phone Two(Optional)</label>
                        <input type="text" class="form-control" value="{{ old('phone_two') }}" name="phone_two">
                        @error('phone_two')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Campus Phone Three(Optional)</label>
                        <input type="text" class="form-control" value="{{ old('phone_three') }}" name="phone_three">
                        @error('phone_three')
                            <span class="badge badge-danger">{{ $message }}</span>
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
