@extends('layouts.master')
@section('content')
    <div class="text-dark">
        <h1 class="text-center">Programme Page</h1>

        <a class="btn btn-success top-right-btn" href="{{ route('admin.programme_page.edit', $programmePage->id) }}">Edit</a>

        <div class="my-3">
            <h3>Image</h3>
            <img src="{{ asset('/programme_page/' . $programmePage->image) }}" style="max-height: 600px;" alt="programme page image">
        </div>

{{--        <p><span style="font-size: 18px; font-weight: 500;">No. of classes</span> - {{ $programmePage->classes }}</p>--}}
{{--        <p><span style="font-size: 18px; font-weight: 500;">No. of courses</span> - {{ $programmePage->courses }}</p>--}}
{{--        <p><span style="font-size: 18px; font-weight: 500;">No. of students</span> - {{ $programmePage->students }}</p>--}}
{{--        <p><span style="font-size: 18px; font-weight: 500;">No. of diplomas</span> - {{ $programmePage->diplomas }}</p>--}}

        <table class="table table-bordered" style="width: 100px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Numbers</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Courses</th>
                    <td>{{ $programmePage->courses }}</td>
                </tr>
                <tr>
                    <th>Classes</th>
                    <td>{{ $programmePage->classes }}</td>
                </tr>
                <tr>
                    <th>Students</th>
                    <td>{{ $programmePage->students }}</td>
                </tr>
                <tr>
                    <th>Diplomas</th>
                    <td>{{ $programmePage->diplomas }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
