@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.lecturer.index') }}" class="btn btn-danger">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route('admin.lecturer.update',$lecturer->id) }}"
            enctype="multipart/form-data">
            @method("PATCH")
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Edit Lecturer</h1>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" type="text" value="{{ $lecturer->name }}">
                @error('name')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input name="position" id="position" class="form-control" type="text" value="{{ $lecturer->position }}">
                @error('position')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($lecturer->image)
                <div class="d-flex flex-column mb-3">
                    <label>Current Image</label>
                    <img src="/lecturer/{{ $lecturer->image }}" style="width: 125px;">
                </div>
            @endif
            <div class="form-group">
                <label>Image</label>
                <input name="image" class="form-control" type="file" />
                @error('image')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
