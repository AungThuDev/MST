@extends('layouts.master')
@section('campus', 'nav-link nav-link active')
@section('title', 'Admin - Campus')
@section('content')
    <h1 class="text-center">Campus Info</h1>
    <a class="btn btn-success top-right-btn" href="/admin/campus">Back</a>

    <h3>Name</h3>
    <p style="text-indent: 15px;">{{ $campus->name }}</p>

    <h3 class="mt-3">Address</h3>
    <p style="text-indent: 15px;">{{ $campus->address }}</p>

    <h3 class="mt-3">Phones</h3>
    <ul style="list-style: square">
        @foreach($campus->phones()->pluck('number') as $phone)
            <li>{{ $phone }}</li>
        @endforeach
    </ul>

    <div>
        <a class="btn btn-success float-right text-white" href="{{ route('admin.campus.edit', $campus->id) }}">Edit</a>
    </div>
@endsection
