@extends('layouts.master')
@section('content')
    <div class="px-4 py-3">
        <h1 class="text-center">Create A New Programme Category</h1>

        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mt-3" for="image">Image <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" />
                @error('image')
                <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary mt-3 float-right">Create</button>
        </form>
    </div>
@endsection
