@extends('layouts.master')

@section('title', 'Admin - Dashboard')

@section('dashboard', 'nav-link nav-link active')

@section('content')
    <div>
        <h1>Hello {{ ucwords(auth()->user()->name) }}</h1>
    </div>
@endsection
