@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div class="card p-2">
        <div>
            <a href="{{route('admin.banner.create')}}" class="btn btn-primary float-right mb-2">Create</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Page Name</th>
                    <th>Banner Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{$banner->page}}</td>
                        <td>
                            <img class="img-thumbnail" src="{{url('/banners/' . $banner->image)}}" style="width: 100px" alt="">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.banner.edit', $banner->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('admin.banner.destroy', $banner->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
                <tr></tr>
            </tbody>
        </table>
    </div>
@endsection