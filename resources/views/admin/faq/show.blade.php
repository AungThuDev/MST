@extends('layouts.master')
@section('faq', 'nav-link nav-link active')
@section('title', 'Admin - FAQ')
@section('content')
    <section>
        <h1 class="text-center">FAQ</h1>
        <p class="faq-question">Q. {{ $faq->question }}</p>
        <p class="faq-answer">A. {{ $faq->answer }}</p>
        <a class="btn btn-success text-white edit-btn float-right"
           href="{{ route('admin.faq.edit', $faq->id) }}">Edit</a>
        <a class="btn btn-success top-right-btn text-white" href="{{ route('admin.faq.index') }}">Back</a>
    </section>
@endsection
