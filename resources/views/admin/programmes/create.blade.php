@extends('layouts.master')
@section('programme', 'nav-link nav-link active')
@section('title', 'Admin - Programmes')
@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Create A New Programme</h1>

        <a class="btn btn-success top-right-btn text-white" href="{{ route('admin.programmes.index') }}">Back</a>

        <form method="POST" action="{{ route('admin.programmes.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="category_id">Category <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id">
                    <option  value="">-select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-4">
                <label for="image">Image<span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
            @error('image')
                <p class="badge badge-danger">{{ $message }}</p>
            @enderror

            <div class="mt-3">
                <label for="description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="7">{{ old('description') }}</textarea>
                @error('description')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="duration">Duration <span class="text-danger">*</span></label>
                <input class="form-control" id="duration" type="text" name="duration" value="{{ old('duration') }}">
                @error('duration')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="link">Link <span class="text-danger">*</span></label>
                <input class="form-control" id="link" type="text" name="link" value="{{ old('link') }}">
                @error('link')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-success mt-3 float-right">Create</button>
        </form>
    </div>
@endsection
