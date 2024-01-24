@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.info.index') }}" class="btn btn-success float-right mb-2">All Contact Information</a>
    </div>
    <form action="{{ route('admin.info.store') }}" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Info Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                        @error('name')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Info Link<span style="color: red">*</span></label>
                        <textarea name="link" class="form-control">{{ old('link') }}</textarea>
                        @error('link')
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
