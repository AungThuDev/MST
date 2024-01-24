@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.partner.index') }}" class="btn btn-danger">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route("admin.partner.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Add New Partner</h1>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" type="text">
                @error('name')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" type="text"></textarea>
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
