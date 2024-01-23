@extends('layouts.master')

@section('home-page', 'nav-link nav-link active')

@section('content')
    <form action="{{route('admin.homepage.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Vision <span style="color: red">*</span></label>
                        <input type="text" value="{{old('vision')}}" class="form-control" name="vision">
                        @error('vision')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Mission<span style="color: red">*</span></label>
                        <input type="text" value="{{old('mission')}}" class="form-control" name="mission">
                        @error('mission')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Title<span style="color: red">*</span></label>
                        <input type="text" value="{{old('about_title')}}" class="form-control" name="about_title">
                        @error('about_title')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Text<span style="color: red">*</span></label>
                        <input type="text" value="{{old('about_text')}}" class="form-control" name="about_text">
                        @error('about_text')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_one">
                        @error('about_image_one')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">About Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="about_image_two">
                        @error('about_image_two')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image One<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_one">
                        @error('journey_image_one')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Journey Image Two<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="journey_image_two">
                        @error('journey_image_two')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Evaluation Title<span style="color: red">*</span></label>
                        <input type="text" value="{{old('eval_title')}}" class="form-control" name="eval_title">
                        @error('eval_title')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Evaluation Image<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="eval_image">
                        @error('eval_image')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Evaluation Text<span style="color: red">*</span></label>
                        <textarea name="eval_text" class="form-control">{{old('eval_text')}}</textarea>
                        @error('eval_text')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress One<span style="color: red">*</span></label>
                        <input type="text" value="{{old('progress_one')}}" class="form-control" name="progress_one">
                        @error('progress_one')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress One Percent<span style="color: red">*</span></label>
                        <input type="number" value="{{old('progress_one_percent')}}" class="form-control" name="progress_one_percent">
                        @error('progress_one_percent')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Two<span style="color: red">*</span></label>
                        <input type="text" value="{{old('progress_two')}}" class="form-control" name="progress_two">
                        @error('progress_two')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Two Percent<span style="color: red">*</span></label>
                        <input type="number" value="{{old('progress_two_percent')}}" class="form-control" name="progress_two_percent">
                        @error('progress_two_percent')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Three<span style="color: red">*</span></label>
                        <input type="text" value="{{old('progress_three')}}" class="form-control" name="progress_three">
                        @error('progress_three')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Progress Three Percent<span style="color: red">*</span></label>
                        <input type="number" value="{{old('progress_three_percent')}}" class="form-control" name="progress_three_percent">
                        @error('progress_three_percent')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Course Text<span style="color: red">*</span></label>
                        <textarea name="course_text" value="{{old('course_text')}}" class="form-control"></textarea>
                        @error('course_text')
                            <span class="badge badge-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div>
                <button type="submit" class="btn btn-primary float-right">Create</button>
            </div>
            
        </div>
    </form>
@endsection