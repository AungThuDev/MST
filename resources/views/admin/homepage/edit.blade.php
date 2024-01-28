@extends('layouts.master')
@section('home-page', 'nav-link nav-link active')
@section('title', 'Admin - Home Page')
@section('content')
    <h1 class="text-center">Edit Home Page Content</h1>

    <a class="btn btn-success text-white top-right-btn" href="{{ route('admin.homepage.index') }}">Back</a>

    <form action="{{ route('admin.homepage.update', $homepage->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="card p-2">
            <div class="row">
                <h1 class="col-12 mb-3">Vision - Mission section</h1>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vision">Vision <span style="color: red">*</span> <span class="text-gray">(Maximum 300 characters)</span></label>
                        <textarea id="vision" name="vision" class="form-control"
                                  rows="4">{{ old('vision') ?? $homepage->vision }}</textarea>
                        @error('vision')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mission">Mission<span style="color: red">*</span> <span class="text-gray">(Maximum 300 characters)</span></label>
                        <textarea id="mission" name="mission" class="form-control"
                                  rows="4">{{ old('mission') ?? $homepage->mission }}</textarea>
                        @error('mission')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h1 class="col-12 mt-5 pt-5">About us section</h1>
                <div class="col-6">
                    <div class="form-group">
                        <label for="about_title">About Title<span style="color: red">*</span></label>
                        <input id="about_title" type="text" value="{{ old('about_title') ?? $homepage->about_title }}"
                               class="form-control"
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
                                  class="form-control"
                                  rows="5">{{ old('about_text') ?? $homepage->about_text }}</textarea>
                        @error('about_text')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group d-flex flex-column">
                        <label for="">About Image One <span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="about_image1" accept="image/*">
                        @error('about_image1')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                        <img class="mt-2" src="{{ asset('/homepage/' . $homepage->about_image1) }}"
                             alt="about section image 1" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group d-flex flex-column">
                        <label for="">About Image Two<span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="about_image2" accept="image/*">
                        @error('about_image2')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                        <img class="mt-2" src="{{ asset('/homepage/' . $homepage->about_image2) }}"
                             alt="about section image 1" style="width: 200px; height: 200px;">
                    </div>
                </div>

                <h1 class="col-12 mt-5 pt-5">'To The Journey Ahead' Section</h1>
                <div class="col-6">
                    <div class="form-group d-flex flex-column">
                        <label for="">Journey Image One<span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="journey_image1" accept="image/*">
                        @error('journey_image1')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                        <img class="mt-2" src="{{ asset('/homepage/' . $homepage->journey_image1) }}"
                             alt="journey section image 1" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group d-flex flex-column">
                        <label for="">Journey Image Two<span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="journey_image2" accept="image/*">
                        @error('journey_image2')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                        <img class="mt-2" src="{{ asset('/homepage/' . $homepage->journey_image2) }}"
                             alt="journey section image 2" style="width: 200px; height: 200px;">
                    </div>
                </div>


                <h1 class="col-12 mt-5 pt-5">Evaluation Section</h1>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eval_title">Evaluation Title<span style="color: red">*</span></label>
                        <input id="eval_title" type="text" value="{{ old('eval_title') ?? $homepage->eval_title }}"
                               class="form-control"
                               name="eval_title">
                        @error('eval_title')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group d-flex flex-column">
                        <label for="">Evaluation Image<span class="text-gray">(Optional)</span></label>
                        <input type="file" class="form-control" name="eval_image" accept="image/*">
                        @error('eval_image')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                        <img class="mt-2" src="{{ asset('/homepage/' . $homepage->eval_image) }}"
                             alt="evaluation section image" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="eval_text">Evaluation Text<span style="color: red">*</span></label>
                        <textarea id="eval_text" name="eval_text"
                                  class="form-control">{{ old('eval_text') ?? $homepage->eval_text }}</textarea>
                        @error('eval_text')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress1">Progress One<span style="color: red">*</span></label>
                        <input id="progress1" type="text" value="{{ old('progress1') ?? $homepage->progress1 }}"
                               class="form-control"
                               name="progress1">
                        @error('progress1')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress1_percent">Progress One Percent<span style="color: red">*</span></label>
                        <input id="progress1_percent" type="number"
                               value="{{ old('progress1_percent') ?? $homepage->progress1_percent }}"
                               class="form-control"
                               name="progress1_percent">
                        @error('progress1_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress2">Progress Two<span style="color: red">*</span></label>
                        <input id="progress2" type="text" value="{{ old('progress2') ?? $homepage->progress2 }}"
                               class="form-control"
                               name="progress2">
                        @error('progress2')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress2_percent">Progress Two Percent<span style="color: red">*</span></label>
                        <input id="progress2_percent" type="number"
                               value="{{ old('progress2_percent') ?? $homepage->progress2_percent }}"
                               class="form-control"
                               name="progress2_percent">
                        @error('progress2_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress3">Progress Three<span style="color: red">*</span></label>
                        <input id="progress3" type="text" value="{{ old('progress3') ?? $homepage->progress3 }}"
                               class="form-control"
                               name="progress3">
                        @error('progress3')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="progress3_percent">Progress Three Percent<span
                                style="color: red">*</span></label>
                        <input id="progress3_percent" type="number"
                               value="{{ old('progress3_percent') ?? $homepage->progress3_percent }}"
                               class="form-control"
                               name="progress3_percent">
                        @error('progress3_percent')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </div>

        </div>
    </form>
@endsection
