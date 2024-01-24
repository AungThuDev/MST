@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-danger">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" action="{{ route('admin.award.update', $award->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Edit Award</h1>
            </div>
            <div class="form-group">
                <label class="">Title</label>
                <input name="title" class="form-control" type="text" value="{{ $award->title }}">
                @error('title')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="">Description</label>
                <textarea name="description" class="form-control">{{ $award->description }}</textarea>
                @error('description')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($award->image)
                <div class="d-flex flex-column mb-3">
                    <label>Current Image</label>
                    <img src="/award/{{ $award->image }}" style="width: 125px;">
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
