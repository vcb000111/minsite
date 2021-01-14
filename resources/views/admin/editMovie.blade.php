@extends('admin.master')
@section('content')
@section('title', 'MySite - Edit Movie')
    <div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="text-center font-weight-bold mb-4 text-primary">Edit Movie</h4>
                <span><a href="{{ route('admin.index') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                <a href="{{ route('admin.thumbnail') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                <a href="{{ route('admin.thumbnail.random') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                    Random</a>
                <a href="{{ route('admin.access.exit') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Exit</a>
                <button data-toggle="modal" data-target="#exampleModal"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-danger shadow-sm mr-2">Remove this
                    movie</button>
                <a href="{{ route('admin.cate.add') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Create
                    Category</a>
                <a href="{{ route('admin.movie.add') }}"
                    class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                    Movie</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm remove this movie!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                                <a href="{{ route('admin.movie.delete', $movie->id) }}" type="button"
                                    class="btn btn-outline-danger">Save changes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <form method="POST" class="mt-3" enctype="multipart/form-data"
                    action=" {{ route('admin.movie.edit', $movie->id) }} ">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $movie->code }}" placeholder="code*" required
                                name="code">
                            <input type="text" class="form-control mt-2" value="{{ $movie->name }}" placeholder="name*"
                                required name="name">
                            <div class="form-group">
                                <select class="form-control mt-2" id="exampleFormControlSelect1" required name="cate_id">
                                    <option value="" data-display="cate*">cate*</option>
                                    @foreach ($cate as $item)
                                        @if ($movie->cate_id == $item->id)
                                            <option selected value="{{ $item->id }}">{{ $item->cate_name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->cate_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control mt-2" value="{{ $movie->url }}" placeholder="url"
                                name="url">
                            <input type="text" class="form-control mt-2" value="{{ $movie->subtitle }}"
                                placeholder="subtitle" name="subtitle">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $movie->day_release }}"
                                placeholder="day_release" name="day_release">
                            <input type="text" class="form-control mt-2" value="{{ $movie->actress }}" placeholder="actress"
                                name="actress">
                            <input type="text" class="form-control mt-3" value="{{ $movie->thumbnail }}"
                                placeholder="thumbnail" name="thumbnail">
                            @if ($movie->seen != 0)
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" checked value="1" name="seen"
                                        id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Seen
                                    </label>
                                </div>
                            @else
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" name="seen"
                                        id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Seen
                                    </label>
                                </div>
                            @endif
                            @if ($movie->favourite == 1)
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" checked value="1" name="favourite"
                                        id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">Favourite
                                    </label>
                                </div>
                            @else
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" name="favourite"
                                        id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">Favourite
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-2">Edit movie</button>
                </form>
            </div>
        </div>
    </div>
@endsection
