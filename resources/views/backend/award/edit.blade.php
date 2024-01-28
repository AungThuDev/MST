@extends('layouts.master')
@section('award', 'nav-link nav-link active')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-success">Back</a>
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
                <label class="">Title <span class="text-danger">*</span></label>
                <input name="title" class="form-control" type="text" value="{{ old('title') ?? $award->title }}">
                @error('title')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="">Description <span class="text-danger">*</span></label>
                <textarea name="description"
                          class="form-control">{{ old('description') ?? $award->description }}</textarea>
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
                <label>Image<span class="text-gray">(Optional)</span></label>
                <input name="image" class="form-control" type="file"/>
                @error('image')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success mt-4">Update</button>
            </div>
        </form>
    </div>
@endsection
