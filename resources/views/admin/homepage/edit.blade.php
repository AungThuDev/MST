@extends('layouts.master')

@section('home-page', 'nav-link nav-link active')


@section('content')
    <form action="{{ route('admin.homepage.update', $homepage->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Vision <span style="color: red">*</span></label>
                        <textarea name="vision" class="form-control">{{ $homepage->vision }}</textarea>
                        @error('vision')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Mission<span style="color: red">*</span></label>
                        <textarea name="mission" class="form-control">{{ $homepage->mission }}</textarea>
                        @error('mission')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Title<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $homepage->about_title }}" name="about_title">
                        @error('about_title')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Text<span style="color: red">*</span></label>
                        <textarea name="about_text" class="form-control">{{ $homepage->about_text }}</textarea>
                        @error('about_text')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_one">
                        <img style="width: 100px" class="img-thumbnail"
                            src="{{ url('/images/' . $homepage->about_image1) }}" alt="">
                        @error('about_image_one')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_two">
                        <img style="width: 100px" class="img-thumbnail"
                            src="{{ url('/images/' . $homepage->about_image2) }}" alt="">
                        @error('about_image_two')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_one">
                        <img style="width: 100px" class="img-thumbnail"
                            src="{{ url('/images/' . $homepage->journey_image1) }}" alt="">
                        @error('journey_image_one')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_two">
                        <img style="width: 100px" class="img-thumbnail"
                            src="{{ url('/images/' . $homepage->journey_image2) }}" alt="">
                        @error('journey_image_two')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Evaluation Title<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $homepage->eval_title }}" name="eval_title">
                        @error('eval_title')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Evaluation Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="eval_image">
                        <img style="width: 100px" class="img-thumbnail"
                            src="{{ url('/images/' . $homepage->eval_image) }}" alt="">
                        @error('eval_image')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Evaluation Text<span style="color: red">*</span></label>
                        <textarea name="eval_text" class="form-control">{{ $homepage->eval_text }}</textarea>
                        @error('eval_text')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress One<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $homepage->prograss1 }}"
                            name="progress_one">
                        @error('progress_one')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress One Percent<span style="color: red">*</span></label>
                        <input type="number" class="form-control" value="{{ $homepage->prograss1_percent }}"
                            name="progress_one_percent">
                        @error('progress_one_percent')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Two<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $homepage->prograss2 }}"
                            name="progress_two">
                        @error('progress_two')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Two Percent<span style="color: red">*</span></label>
                        <input type="number" class="form-control" value="{{ $homepage->prograss2_percent }}"
                            name="progress_two_percent">
                        @error('progress_two_percent')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Three<span style="color: red">*</span></label>
                        <input type="text" class="form-control" value="{{ $homepage->prograss3 }}"
                            name="progress_three">
                        @error('progress_three')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Three Percent<span style="color: red">*</span></label>
                        <input type="number" class="form-control" value="{{ $homepage->prograss3_percent }}"
                            name="progress_three_percent">
                        @error('progress_three_percent')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Course Text<span style="color: red">*</span></label>
                        <textarea name="course_text" class="form-control">{{ $homepage->course_text }}</textarea>
                        @error('course_text')
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
