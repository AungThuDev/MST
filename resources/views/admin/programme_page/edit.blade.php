@extends('layouts.master')

@section('programme-page', 'nav-link nav-link active')

@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Edit Programme Page Content</h1>

        <form method="POST" action="{{ route('admin.programme_page.update', $programmePage->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mt-4 d-flex flex-column">
                <label for="image">Image<span class="text-gray">(Optional)</span></label>
                <img src="{{ asset('/programme_page/' . $programmePage->image) }}" alt="Programme page image"
                    style="height: 450px;">
                <input class="form-control mt-2" type="file" id="image" name="image" accept="image/*"
                    value="{{ old('image') }}">
            </div>
            @error('image')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="courses">Number of courses <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="courses" name="courses"
                    value="{{ old('courses') ?? $programmePage->courses }}">
            </div>
            @error('courses')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="classes">Number of classes <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="classes" name="classes"
                    value="{{ old('classes') ?? $programmePage->classes }}">
            </div>
            @error('classes')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="students">Number of classes <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="students" name="students"
                    value="{{ old('students') ?? $programmePage->students }}">
            </div>
            @error('students')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="diplomas">Number of classes <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="diplomas" name="diplomas"
                    value="{{ old('diplomas') ?? $programmePage->diplomas }}">
            </div>
            @error('diplomas')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <button class="btn btn-success mt-3 float-right">Save</button>
        </form>
    </div>
@endsection
