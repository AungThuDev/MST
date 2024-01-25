@extends('layouts.master')

@section('partner', 'nav-link nav-link active')


@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.partner.index') }}" class="btn btn-success">Back</a>
    </div>
    <div class="row p-4">
        <form class="col" method="POST" action="{{ route('admin.partner.update', $partner->id) }}"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Edit Partner</h1>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" type="text"
                    value="{{ old('name') ?? $partner->name }}">
                @error('name')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" type="text">{{ old('description') ?? $partner->description }}</textarea>
                @error('description')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($partner->image)
                <div class="d-flex flex-column mb-3">
                    <label>Current Image</label>
                    <img src="/partner/{{ $partner->image }}" style="width: 125px;">
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
                <button type="submit" class="btn btn-success float-right mt-4">Update</button>
            </div>
        </form>
    </div>
@endsection
