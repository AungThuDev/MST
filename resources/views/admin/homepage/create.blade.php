@extends('layouts.master')
@section('home-page', 'nav-link nav-link active')
@section('content')
    <form action="{{ route('admin.homepage.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="card p-2">
            <div class="row">
                <h2 class="col-12 mb-3">Vision - Mission section</h2>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vision">Vision <span style="color: red">*</span></label>
                        <textarea id="vision" name="vision" class="form-control">{{ old('vision') }}</textarea>
                        @error('vision')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mission">Mission<span style="color: red">*</span></label>
                        <textarea id="mission" name="mission" class="form-control">{{ old('mission') }}</textarea>
                        @error('mission')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h2 class="col-12 mt-5">About us section</h2>

                <div class="col-6">
                    <div class="form-group">
                        <label for="about_title">About Title<span style="color: red">*</span></label>
                        <input id="about_title" type="text" value="{{ old('about_title') }}" class="form-control"
                               name="about_title">
                        @error('about_title')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="about_text">About Text<span style="color: red">*</span></label>
                        <textarea id="about_text" name="about_text"
                                  class="form-control">{{ old('about_text') }}</textarea>
                        @error('about_text')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_one">
                        @error('about_image_one')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_two">
                        @error('about_image_two')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <h2 class="col-12 mt-5">'To The Journey Ahead' Section</h2>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_one">
                        @error('journey_image_one')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_two">
                        @error('journey_image_two')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <h2 class="col-12 mt-5">Evaluation Section</h2>

                <div class="col-6">
                    <div class="form-group">
                        <label for="eval_title">Evaluation Title<span style="color: red">*</span></label>
                        <input id="eval_title" type="text" value="{{ old('eval_title') }}" class="form-control"
                               name="eval_title">
                        @error('eval_title')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Evaluation Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="eval_image">
                        @error('eval_image')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="eval_text">Evaluation Text<span style="color: red">*</span></label>
                        <textarea id="eval_text" name="eval_text" class="form-control">{{ old('eval_text') }}</textarea>
                        @error('eval_text')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eval_text">Progress One<span style="color: red">*</span></label>
                        <input id="eval_text" type="text" value="{{ old('progress_one') }}" class="form-control"
                               name="progress_one">
                        @error('progress_one')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress_one_percent">Progress One Percent<span style="color: red">*</span></label>
                        <input id="progress_one_percent" type="number" value="{{ old('progress_one_percent') }}"
                               class="form-control"
                               name="progress_one_percent">
                        @error('progress_one_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress_two">Progress Two<span style="color: red">*</span></label>
                        <input id="progress_two" type="text" value="{{ old('progress_two') }}" class="form-control"
                               name="progress_two">
                        @error('progress_two')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress_two_percent">Progress Two Percent<span style="color: red">*</span></label>
                        <input id="progress_two_percent" type="number" value="{{ old('progress_two_percent') }}"
                               class="form-control"
                               name="progress_two_percent">
                        @error('progress_two_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress_three">Progress Three<span style="color: red">*</span></label>
                        <input id="progress_three" type="text" value="{{ old('progress_three') }}" class="form-control"
                               name="progress_three">
                        @error('progress_three')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress_three_percent">Progress Three Percent<span
                                style="color: red">*</span></label>
                        <input id="progress_three_percent" type="number" value="{{ old('progress_three_percent') }}"
                               class="form-control"
                               name="progress_three_percent">
                        @error('progress_three_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-success float-right">Create</button>
            </div>

        </div>
    </form>
@endsection
