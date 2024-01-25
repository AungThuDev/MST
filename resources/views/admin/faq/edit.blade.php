@extends('layouts.master')

@section('faq', 'nav-link nav-link active')

@section('content')
    <section>
        <h1 class="text-center">Edit FAQ</h1>
        <form method="POST" action="{{ route('admin.faq.update', $faq->id) }}">
            @method('PATCH')
            @csrf

            <div>
                <label for="question">Question <span class="text-danger">*</span></label>
                <input class="form-control" id="question" type="text" name="question"
                    value="{{ old('question') ?? $faq->question }}">
                @error('question')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mt-3" for="answer">Answer <span class="text-danger">*</span></label>
                <textarea class="form-control" id="answer" name="answer" rows="10">{{ old('answer') ?? $faq->answer }}</textarea>
                @error('answer')
                    <p class="badge badge-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-success mt-3 float-right">Update</button>
        </form>

        <a class="btn btn-success top-right-btn text-white" href="{{ route('admin.faq.index') }}">Back</a>
    </section>
@endsection
