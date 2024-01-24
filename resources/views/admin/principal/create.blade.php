@extends('layouts.master')
@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Create Principal</h1>

        <form method="POST" action="{{ route('admin.principal.store') }}">
            @csrf

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Image for Home Page</label>
                <input type="file" id="home_image" name="home_image">
            </div>

            <div>
                <label class="mt-3" for="message">Message For Home Page <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="7">{{ old('message') }}</textarea>
                @error('message')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mt-3" for="faculty_text">Description For Faculty Page <span
                        class="text-danger">*</span></label>
                <textarea class="form-control" id="faculty_text" name="faculty_text" rows="7">{{ old('faculty_text') }}</textarea>
                @error('faculty_text')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-success mt-3 float-right">Create</button>
        </form>
    </div>
@endsection
