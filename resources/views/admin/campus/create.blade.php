@extends('layouts.master')
@section('campus', 'nav-link nav-link active')
@section('title', 'Admin - Campus')
@section('content')
    <h1 class="text-center">Create Campus</h1>
    <div>
        <a href="{{ route('admin.campus.index') }}" class="btn btn-success float-right mb-2">Back</a>
    </div>
    <form action="{{ route('admin.campus.store') }}" method="POST">
        @csrf
        <div class=" p-2">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Campus Name <span style="color: red">*</span></label>
                        <input id="name" type="text" class="form-control text-dark" value="{{ old('name') }}"
                               name="name">
                        @error('name')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Campus Address <span style="color: red">*</span></label>
                        <textarea id="address" name="address"
                                  class="form-control text-dark">{{ old('address') }}</textarea>
                        @error('address')
                        <span class="badge badge-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group" id="phones">
                <label for="phones">Campus Phones <span style="color: red">*</span></label>
                @if(old('phones'))
                    @for($i = 0; $i < count(old('phones')); $i++)
                        <div class="d-flex align-items-center">
                            <div>
                                <input id="phones" placeholder="Enter Phone Number" type="text"
                                       class="form-control mt-3 phone-input"
                                       value="{{ old('phones')[$i] }}" name="phones[]">
                                @error('phones.' . $i)
                                <span class="badge badge-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if($i !== 0)
                                <button
                                    class="closeBtn">
                                    X
                                </button>
                            @endif
                        </div>

                    @endfor
                @else
                    <input id="phones" placeholder="Enter Phone Number" type="text" class="form-control phone-input"
                           name="phones[]">
                @endif
            </div>
            <button class="btn btn-success addPhone" type="button">Add Another Phone</button>

            <div>
                <button type="submit" class="btn btn-success float-right">Create</button>
            </div>

        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).on('click', '.addPhone', function (a) {
            a.preventDefault();
            let div = document.createElement('div');
            div.className = 'd-flex align-items-center mt-3 ';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control phone-input';
            input.name = 'phones[]';
            input.placeholder = 'Enter Phone Number';

            let closeBtn = document.createElement('button');
            closeBtn.innerText = 'X';
            closeBtn.className = 'closeBtn';

            div.appendChild(input);
            div.appendChild(closeBtn);

            document.getElementById('phones').appendChild(div);
        })

        $(document).on('click', '.closeBtn', function (event) {
            event.preventDefault();
            event.target.parentElement.remove();
        })
    </script>
@endsection
