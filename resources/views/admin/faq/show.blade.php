@extends('layouts.master')
@section('content')
    <section class="position-relative">
        <h1 class="text-center">FAQ</h1>
        <p class="faq-question">Q. {{ $faq->question }}</p>
        <p class="faq-answer">A. {{ $faq->answer }}</p>
        <a class="btn btn-primary text-white edit-btn float-right" href="{{ route('admin.faq.edit', $faq->id) }}">Edit</a>
    </section>
@endsection
