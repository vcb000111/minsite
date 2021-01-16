@extends('admin.master')
@section('content')
@section('title', 'MinSite - Add Movie')
    <div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="text-center font-weight-bold mb-4 text-primary">Add Movie</h4>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <span><a href="{{ route('admin.index') }}"
                                    class="btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                            <a href="{{ route('admin.thumbnail') }}"
                                class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                            <a href="{{ route('admin.thumbnail.random') }}"
                                class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                                Random</a>
                        </ul>
                        <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data"
                            action="{{ route('admin.list.search') }}">
                            <input type="text" class="form-control w-auto float-right mr-2" name="search"
                                placeholder="Search list" required name="access_key">
                        </form>
                        <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data"
                            action="{{ route('admin.thumbnail.search') }}">
                            <input type="text" class="form-control w-auto float-right mr-2" name="search"
                                placeholder="Search thumbnail" required name="access_key">
                        </form>
                        <a href="{{ route('admin.movie.add') }}" class="btn btn-sm btn-primary shadow-sm mr-2">Add
                            Movie</a>
                        <a href="{{ route('admin.cate.add') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Create
                            Category</a>
                        <a href="{{ route('admin.access.exit') }}" class="btn btn-sm btn-danger shadow-sm">Exit</a>
                    </div>
                </nav>


                <form method="POST" class="mt-3" enctype="multipart/form-data" action="{{ route('admin.movie.add') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="code*" autofocus required name="code">
                            <input type="text" class="form-control mt-2" placeholder="name*" required name="name">
                            <div class="form-group">
                                <select class="form-control mt-2" id="exampleFormControlSelect1" required name="cate_id">
                                    <option value="" data-display="cate*">cate*</option>
                                    @foreach ($cate as $item)
                                        <option value="{{ $item->id }}">{{ $item->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control mt-2" placeholder="url" name="url">
                            <input type="text" class="form-control mt-2 mb-2" placeholder="subtitle" name="subtitle">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="day_release" name="day_release">
                            <input type="text" class="form-control mt-2" placeholder="actress" name="actress">
                            <input type="text" class="form-control mt-2" placeholder="thumbnail" name="thumbnail">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="1" name="seen" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Seen
                                </label>
                            </div>
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="1" name="favourite"
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">Favourite
                                </label>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block mt-2">Add movie</button>
                </form>
            </div>
        </div>
    </div>
@endsection
