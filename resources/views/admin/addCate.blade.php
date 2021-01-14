@extends('admin.master')
@section('content')
@section('title', 'MinSite - Create Category')
    <div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Content Row -->
                <h4 class="text-center font-weight-bold mb-4 text-primary">Create Category</h4>
                <span><a href="{{ route('admin.index') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                <a href="{{ route('admin.thumbnail') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                <a href="{{ route('admin.thumbnail.random') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                    Random</a>
                <a href="{{ route('admin.access.exit') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Exit</a>
                <a href="{{ route('admin.cate.add') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">Create
                    Category</a>
                <a href="{{ route('admin.movie.add') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                    Movie</a>
                <form method="POST" class="mt-3" enctype="multipart/form-data" action="{{ route('admin.cate.add') }}">
                    @csrf
                    <input type="text" class="form-control" placeholder="Category name" required name="cate_name">
                    <button type="submit" class="btn btn-primary btn-block mt-2">Add cate</button>
                </form>
            </div>
        </div>
    </div>
@endsection
