@extends('layouts.master')

@section('principal', 'nav-link nav-link active')

@section('content')
    <section>
        <h1 class="text-center">Principal - {{ $principal->name }}</h1>
        <a class="top-right-btn btn btn-success" href="{{ route('admin.principal.edit', $principal->id) }}">Edit</a>

        <h2 class="mt-5">Home Page</h2>
        <div class="d-flex justify-content-between">
            <img src="{{ asset('/principal/' . $principal->home_image) }}" alt="Principal Home Page Image"
                style="max-width: 300px;">
            <p class="px-3">{{ $principal->message }}</p>
        </div>

        <hr>

        <h2>Faculty Page</h2>
        <div class="d-flex justify-content-between">
            <img src="{{ asset('/principal/' . $principal->faculty_image) }}" alt="Principal Faculty Page Image"
                style="max-width: 300px;">
            <p class="px-3">{{ $principal->faculty_text }}</p>
        </div>

    </section>
@endsection
