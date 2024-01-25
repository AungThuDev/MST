@extends('layouts.master')

@section('principal', 'nav-link nav-link active')

@section('content')
    <section>
        <h1 class="text-center">Edit Principal</h1>
        <form method="POST" action="{{ route('admin.principal.update', $principal->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name"
                    value="{{ old('name') ?? $principal->name }}">
                @error('name')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 d-flex flex-column">
                <label>Image for Home Page <span class="text-gray">(Optional)</span></label>
                <img src="{{ asset('/principal/' . $principal->home_image) }}" alt="Principal Home Page Image"
                    style="width: 200px;">
                <input class="form-control mt-2" type="file" id="home_image" name="home_image" accept="image/*">
            </div>
            @error('home_image')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="message">Message For Home Page <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="7">{{ old('message') ?? $principal->message }}</textarea>
                @error('message')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 d-flex flex-column">
                <label>Image for Faculty Page <span class="text-gray">(Optional)</span></label>
                <img src="{{ asset('/principal/' . $principal->faculty_image) }}" alt="Principal Faculty Page Image"
                    style="width: 200px;">
                <input class="form-control mt-2" type="file" id="faculty_image" name="faculty_image" accept="image/*">
            </div>
            @error('faculty_image')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-4">
                <label for="faculty_text">Description For Faculty Page <span class="text-danger">*</span></label>
                <textarea class="form-control" id="faculty_text" name="faculty_text" rows="7">{{ old('faculty_text') ?? $principal->faculty_text }}</textarea>
                @error('faculty_text')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-primary mt-3 float-right">Save</button>
        </form>
    </section>
@endsection
