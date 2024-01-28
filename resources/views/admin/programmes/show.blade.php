@extends('layouts.master')

@section('programme', 'nav-link nav-link active')

@section('content')
    <section>
        <h1 class="text-center">Programme</h1>

        <a class="btn btn-success top-right-btn text-white" href="{{ route('admin.programmes.index') }}">Back</a>

        <div class="text-dark fw-bold mt-4" style="padding-left: 10px;">
            <img src="{{ asset('/programmes/' . $programme->image) }}" style="max-width: 500px;">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mt-3">Name - {{ $programme->name }}</p>
                <a class="btn btn-success" href="{{ route('admin.programmes.edit', $programme->id) }}">Edit</a>
            </div>
            <p>Category - {{ $programme->category->name }}</p>
            <p>Duration - {{ $programme->duration }}</p>
            <p>Link - {{ $programme->link }}</p>


            <hr>
            <p>Description</p>
            <p>{{ $programme->description }}</p>
        </div>

    </section>
@endsection
