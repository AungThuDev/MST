@extends('layouts.master')
@section('content')
    <h1 class="text-center">Home Page</h1>

    <a class="btn btn-success top-right-btn text-white"
       href="{{ route('admin.homepage.edit', $homepage->id) }}">Edit</a>

    <div class="row mt-4">
        <div class="col-6">
            <h2>Vision</h2>
            <p>{{ $homepage->vision }}</p>
        </div>
        <div class="col-6">
            <h2>Mission</h2>
            <p>{{ $homepage->mission }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h2>'About' section</h2>
        <div class="d-flex justify-content-start">
            <div class="d-flex justify-content-start">
                <img src="{{ asset('/homepage/' . $homepage->about_image1) }}" alt="about section image 1"
                     style="max-width: 200px;">
                <img src="{{ asset('/homepage/' . $homepage->about_image2) }}" alt="about section image 2"
                     style="max-width: 200px; margin-left: 10px;">
            </div>
            <div style="padding-left: 10px;">
                <h3>{{ $homepage->about_title }}</h3>
                <p>{{ $homepage->about_text }}</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>'To The Journey Ahead' section</h2>
        <div class="d-flex justify-content-start">
            <img src="{{ asset('/homepage/' . $homepage->journey_image1) }}" alt="journey section image 1"
                 style="width: 300px; height: 300px; object-fit: cover;">
            <img src="{{ asset('/homepage/' . $homepage->journey_image2) }}" alt="journey section image 2"
                 style="width: 300px; height: 300px; margin-left: 10px; object-fit: cover;">
        </div>
    </div>

    <div class="mt-5">
        <h2>'Evaluation' section</h2>
        <div class="d-flex justify-content-start">
            <img src="{{ asset('/homepage/' . $homepage->eval_image) }}" alt="about section image 1"
                 style="max-width: 400px;">
            <div style="padding-left: 10px;">
                <h3>{{ $homepage->eval_title }}</h3>
                <p>{{ $homepage->eval_text }}</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Percent</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>{{ $homepage->progress1 }}</th>
                        <td>{{ $homepage->progress1_percent }}</td>
                    </tr>
                    <tr>
                        <th>{{ $homepage->progress2 }}</th>
                        <td>{{ $homepage->progress2_percent }}</td>
                    </tr>
                    <tr>
                        <th>{{ $homepage->progress3 }}</th>
                        <td>{{ $homepage->progress3_percent }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
