@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.campus.index') }}" class="btn btn-success float-right mb-2">All Campus</a>
    </div>
    <form action="{{ route('admin.campus.update', $campus->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control text-dark" value="{{ $campus->name }}" name="name">
                        @error('name')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Address<span style="color: red">*</span></label>
                        <textarea name="address" class="form-control text-dark">{{ $campus->address }}</textarea>
                        @error('address')
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
