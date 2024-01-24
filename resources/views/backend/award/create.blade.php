@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-danger">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route("admin.award.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Add New Award</h1>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" id="title" class="form-control" type="text">
                @error('title')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
                @error('description')
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
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
