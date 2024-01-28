@extends('layouts.master')
@section('programme-page', 'nav-link nav-link active')
@section('title', 'Admin - Programme Page')
@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Create Programme Page Content</h1>

        <form method="POST" action="{{ route('admin.programme_page.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <label for="image">Image<span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*"
                       value="{{ old('image') }}">
            </div>
            @error('image')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="courses">Number of courses <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="courses" name="courses" value="{{ old('courses') }}">
            </div>
            @error('courses')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="classes">Number of classes <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="classes" name="classes" value="{{ old('classes') }}">
            </div>
            @error('classes')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="students">Number of students <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="students" name="students" value="{{ old('students') }}">
            </div>
            @error('students')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="diplomas">Number of diplomas <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="diplomas" name="diplomas" value="{{ old('diplomas') }}">
            </div>
            @error('diplomas')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <button class="btn btn-success mt-3 float-right">Create</button>
        </form>
    </div>
@endsection
