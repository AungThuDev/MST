@extends('layouts.master')
@section('award', 'nav-link nav-link active')
@section('title', 'Admin - Awards')
@section('content')
    <h1 class="text-center">Partner</h1>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.partner.index') }}" class="btn btn-success">Back</a>
    </div>

    <div style="max-width: 500px; margin: 15px auto" >
        <img src="{{ asset('/partner/' . $partner->image) }}" alt="partner image" style="width: 100%">
    </div>


    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3>Name</h3>
            <p>{{ $partner->name }}</p>
        </div>
        <a class="btn btn-success text-white" href="{{ route('admin.partner.edit', $partner->id) }}">Edit</a>
    </div>


    <h3>Description</h3>
    <p>{{ $partner->description }}</p>
@endsection
