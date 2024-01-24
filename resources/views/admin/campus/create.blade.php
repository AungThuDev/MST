@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div>
        <a href="{{ route('admin.campus.index') }}" class="btn btn-success float-right mb-2">All Campus</a>
    </div>
    <form action="{{ route('admin.campus.store') }}" method="POST">
        @csrf
        <div class="card p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control text-dark" value="{{ old('name') }}" name="name">
                        @error('name')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Campus Address<span style="color: red">*</span></label>
                        <textarea name="address" class="form-control text-dark">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" id="phones">
                        <label for="">Campus Phones<span style="color: red">*</span></label>
                        <input placeholder="Enter Phone Number" type="text" class="form-control"
                            value="{{ old('phones.0') }}" name="phones[]">
                        @error('phone_one')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-8"></div>
                <div class="col-4">
                    <button class="btn btn-success addPhone" type="button">Add Another Phone</button>
                </div>



            </div>
            <div>
                <button type="submit" class="btn btn-success float-right">Create</button>
            </div>

        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).on('click', '.addPhone', function(a) {
            a.preventDefault();
            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mt-3';
            input.name = 'phones[]';
            input.placeholder = 'Enter Phone Number';
            document.getElementById('phones').appendChild(input);
        })
    </script>
@endsection
