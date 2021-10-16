@extends('admin.master')
@section('content')
@section('title', 'MinSite - Add IDOL')
<div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Content Row -->
            <h4 class="text-center font-weight-bold mb-4 text-primary">Add IDOL</h4>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <span><a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                        <a href="{{ route('admin.thumbnail') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                        <a href="{{ route('admin.thumbnail.random') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                            Random</a>
                        <a href="{{ route('admin.thumbnail.fap') }}" class="btn btn-sm btn-outline-dark shadow-sm mr-2">FAP <i class="fas fa-heart text-danger"></i></a>

                    </ul>
                    <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.list.search') }}">
                        <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search list" required name="access_key">
                    </form>
                    <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.thumbnail.search') }}">
                        <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search thumbnail" required name="access_key">
                    </form>
                    <a href="{{ route('admin.movie.add') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                        Movie</a>
                    <a href="{{ route('admin.cate.add') }}" class="btn btn-sm btn-primary shadow-sm mr-2">Create
                        Category</a>

                    <a href="{{ route('admin.access.exit') }}" class="btn btn-sm btn-danger shadow-sm">Exit</a>

                </div>
            </nav>
            <form method="POST" class="mt-3" enctype="multipart/form-data" action="{{ route('admin.idols.add.post') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <input type="text" autofocus class="form-control" placeholder="IDOL name" required name="idol_name">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control " placeholder="IDOL thumbnail" required name="idol_thumbnail">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-2">Add IDOL</button>
            </form>
        </div>
    </div>
</div>
@endsection