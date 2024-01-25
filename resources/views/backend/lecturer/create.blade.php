@extends('layouts.master')

@section('lecturer', 'nav-link nav-link active')


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.lecturer.index') }}" class="btn btn-success">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route('admin.lecturer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Add New Lecturer</h1>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" type="text">
                @error('name')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input name="position" id="position" class="form-control" type="text">
                @error('position')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" class="form-control" type="file" />
                @error('image')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-success float-right mt-4">Create</button>
            </div>
        </form>
    </div>
@endsection
