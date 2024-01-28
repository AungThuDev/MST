@extends('layouts.master')
@section('award', 'nav-link nav-link active')
@section('title', 'Admin - Awards')
@section('content')
    <h1 class="text-center">Award</h1>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.award.index') }}" class="btn btn-success">Back</a>
    </div>

    <div style="max-width: 500px; margin: 15px auto" >
        <img src="{{ asset('/award/' . $award->image) }}" alt="award image" style="width: 100%">
    </div>


    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3>Name</h3>
            <p>{{ $award->title }}</p>
        </div>
        <a class="btn btn-success text-white" href="{{ route('admin.award.edit', $award->id) }}">Edit</a>
    </div>


    <h3>Description</h3>
    <p>{{ $award->description }}</p>
@endsection
