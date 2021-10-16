@extends('admin.master')
@section('content')
@section('title', 'MinSite - IDOLS')

<div id="content">
    <div class="container-fluid bg-gray-200 p-2 border border-bottom-primary border rounded">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    <h4 class="text-center font-weight-bold mb-4">My Favourite IDOLS</h4>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <span><a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                                <a href="{{ route('admin.thumbnail') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                                <a href="{{ route('admin.thumbnail.random') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Random</a>
                                <a href="{{ route('admin.thumbnail.fap') }}" class="btn btn-sm btn-outline-dark shadow-sm mr-2">FAP</a>
                                <a href="{{ route('admin.idols') }}" class="btn btn-sm btn-danger shadow-sm mr-2">IDOLS</i></a>
                            </ul>
                            <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.list.search') }}">
                                <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search list" required name="access_key">
                            </form>
                            <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.thumbnail.search') }}">
                                @if ($search!='')
                                <input type="text" class="form-control w-auto float-right mr-2" value="{{ $search }}" name="search" placeholder="Search thumbnail" required name="access_key">
                                @else
                                <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search thumbnail" required name="access_key">
                                @endif
                            </form>

                            <a href="{{ route('admin.thumbnail', ['seen' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.thumbnail', ['favourite' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    <a class="dropdown-item" href="{{ route('admin.thumbnail', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{ route('admin.idols.add.get') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Add IDOL</a>

                            <a href="{{ route('admin.access.exit') }}" class="btn btn-sm btn-danger shadow-sm">Exit</a>

                        </div>
                    </nav>

                </div>
            </div>
            <div class="card-body p-2">
                <div class="row d-flex align-items-center justify-content-center">
                    @foreach ($idols as $item)
                    <div class="col-md-3 mb-1">
                        <div class="mb-2">
                            <div class="">
                                <img style="cursor:pointer" onclick="onClick(this)" title="{{ $item->idol_name }}" src="{{ $item->idol_thumbnail }}" class="img-fluid" alt="">
                                <div class="" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                    <div class="text-center">
                                        <a href="{{ route('admin.thumbnail.search', ['search' => $item->idol_name]) }}" style="font-size:20px" class="card-link text-dark font-weight-bold">
                                            {{ $item->idol_name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="modal01" class="w3-modal" style="padding-top:15px !important" onclick="this.style.display='none'">
                        <div class="w3-modal-content w3-animate-zoom">
                            <img id="img01" style="width:100%">
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-center mt-4">
                </div>
            </div>
        </div>
        <!-- Content Row -->
    </div>
</div>
@endsection