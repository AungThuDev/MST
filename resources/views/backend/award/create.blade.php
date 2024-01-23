@extends('layouts.master')

@section('style')
    <style>
        label.label input[type="file"] {
            position: absolute;
            top: -1000px;
        }

        .label {
            cursor: pointer;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 5px 15px;
            background: #dddddd;
            display: inline-block;
        }

        .label:hover {
            background: rgb(96, 168, 255);
        }

        .label:active {
            background: #9fa1a0;
        }

        .label:invalid+span {
            color: #000000;
        }

        .label:valid+span {
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-danger">Back</a>
    </div>
    <div class="row p-4">
        <form class="col-md-6 offset-3" method="POST" action="{{ route("admin.award.store") }}" enctype="multipart/form-data">
            @csrf
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
            <label class="label">
                <input name="image" type="file" />
                <span>Select an Image</span>
                @error('image')
                    <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </label>
            <div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
