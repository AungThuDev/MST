@extends('layouts.master')

@section('category', 'nav-link nav-link active')

@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Edit Category</h1>

        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name"
                    value="{{ old('name') ?? $category->name }}">
                @error('name')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label class="mt-3" for="image">Image <span class="text-gray">(Optional)</span></label>
                <img src="{{ asset('/categories/' . $category->image) }}" alt="Programme Category Image"
                    style="width: 300px;">
                <input type="file" class="form-control mt-2" id="image" name="image" accept="image/*" />
                @error('image')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-success mt-3 float-right">Update</button>
        </form>

        <a class="btn btn-success top-right-btn text-white" href="{{ route('admin.categories.index') }}">Back</a>

    </div>
@endsection
