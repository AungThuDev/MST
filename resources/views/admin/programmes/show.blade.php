@extends('layouts.master')
@section('content')
    <section>
        <h1 class="text-center">Programme</h1>
        <a class="top-right-btn btn btn-primary" href="{{ route('admin.programmes.edit', $programme->id) }}">Edit</a>

        <div class="text-dark fw-bold mt-4" style="padding-left: 10px;">
            <img src="{{ asset('/programmes/' . $programme->image) }}" style="max-width: 500px;">
            <p class="mt-3">Name - {{ $programme->name }}</p>
            <p>Category - {{ $programme->category->name }}</p>
            <p>Duration - {{ $programme->duration }}</p>
            <p>Link - {{ $programme->link }}</p>
            <hr>
            <p>Description</p>
            <p>{{ $programme->description }}</p>
        </div>

    </section>
@endsection
