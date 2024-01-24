@extends('layouts.master')
@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Create Principal</h1>

        <form method="POST" action="{{ route('admin.principal.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="home_image">Image for Home Page <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="home_image" name="home_image" accept="image/*">
            </div>
            @error('home_image')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="message">Message For Home Page <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="7">{{ old('message') }}</textarea>
                @error('message')
                <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="faculty_image">Image for Faculty Page <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="faculty_image" name="faculty_image" accept="image/*">
            </div>
            @error('faculty_image')
            <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="faculty_text">Description For Faculty Page <span class="text-danger">*</span></label>
                <textarea class="form-control" id="faculty_text" name="faculty_text" rows="7">{{ old('faculty_text') }}</textarea>
                @error('faculty_text')
                <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-primary mt-3 float-right">Create</button>
        </form>
    </div>
@endsection
