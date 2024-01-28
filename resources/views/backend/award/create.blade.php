@extends('layouts.master')
@section('award', 'nav-link nav-link active')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-success">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route('admin.award.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Add New Award</h1>
            </div>
            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input name="title" id="title" class="form-control" type="text" value="{{ old('title') }}">
                @error('title')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image <span class="text-danger">*</span></label>
                <input id="image" name="image" class="form-control" type="file"/>
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
