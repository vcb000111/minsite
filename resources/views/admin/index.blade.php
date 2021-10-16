@extends('admin.master')
@section('content')
@section('title', 'MinSite - List')

<div id="content">
    <div class="container-fluid bg-gray-200 p-2 border border-bottom-primary border rounded">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    <h4 class="text-center font-weight-bold mb-4">List Movie</h4>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">

                                <span><a href="{{ route('admin.index') }}" class="btn btn-sm btn-primary shadow-sm mr-2">List</a></span>
                                <a href="{{ route('admin.thumbnail') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                                <a href="{{ route('admin.thumbnail.random') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Random</a>
                                <a href="{{ route('admin.thumbnail.fap') }}" class="btn btn-sm btn-outline-dark shadow-sm mr-2">FAP</a>
                                <a href="{{ route('admin.idols') }}" class="btn btn-sm btn-outline-danger shadow-sm mr-2">IDOLS</i></a>

                            </ul>
                            <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.list.search') }}">
                                @if ($search!='')
                                <input type="text" class="form-control w-auto float-right mr-2" value="{{ $search }}" name="search" placeholder="Search list" required name="access_key">
                                @else
                                <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search list" required name="access_key">
                                @endif
                            </form>
                            <form class="form-inline input-group-sm" method="GET" enctype="multipart/form-data" action="{{ route('admin.thumbnail.search') }}">
                                <input type="text" class="form-control w-auto float-right mr-2" name="search" placeholder="Search thumbnail" required name="access_key">
                            </form>



                            @if ($seen == 0)
                            @if ($favourite == 0)
                            @if ($cate_id == 0)
                            {{-- 1 --}}
                            <a href="{{ route('admin.index', ['seen' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['favourite' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    <a class="dropdown-item" href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            {{-- 2 --}}
                            <a href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    @if ($cate_id == $item_cate->id)
                                    <a class="dropdown-item active" href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @else
                            @if ($cate_id == 0)
                            {{-- 3 --}}
                            <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index') }}" class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    <a class="dropdown-item" href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            {{-- 4 --}}
                            <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['cate_id' => $cate_id]) }}" class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    @if ($cate_id == $item_cate->id)
                                    <a class="dropdown-item active" href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endif
                            @else
                            @if ($favourite == 0)
                            @if ($cate_id == 0)
                            {{-- 5 --}}
                            <a href="{{ route('admin.index') }}" class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1']) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    <a class="dropdown-item" href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            {{-- 6 --}}
                            <a href="{{ route('admin.index', ['cate_id' => $cate_id]) }}" class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    @if ($cate_id == $item_cate->id)
                                    <a class="dropdown-item active" href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @else
                            {{-- 7 --}}
                            @if ($cate_id == 0)
                            <a href="{{ route('admin.index', ['favourite' => '1']) }}" class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['seen' => '1']) }}" class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    <a class="dropdown-item" href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            {{-- 8 --}}
                            <a href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                            <a href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $cate_id]) }}" class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                            <div class="btn-group float-right shadow-sm">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($cate as $item_cate)
                                    @if ($cate_id == $item_cate->id)
                                    <a class="dropdown-item active" href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @endif
                            @endif
                            <a href="{{ route('admin.movie.add') }}" class=" btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                                Movie</a>
                            <a href="{{ route('admin.cate.add') }}" class="btn btn-sm btn-outline-primary shadow-sm mr-2">Create
                                Category</a>
                            <a href="{{ route('admin.access.exit') }}" class="btn btn-sm btn-danger shadow-sm">Exit</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center text-dark" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Cate</th>
                                <th>Release</th>
                                <th>Actress</th>
                                <th style="width:10em;">Thumbnail</th>
                                <th>Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($movie as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    @php
                                    $arr2=explode('-',$item->code);
                                    $code=$arr2[0];
                                    @endphp
                                    <span title="{{ $item->code }}" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                        <a class="text-decoration-none text-primary" href="{{ route('admin.list.search', ['search' => $code]) }}">{{ $item->code }}</a></span>
                                </td>
                                <td><a style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;" title="{{ $item->name }}" class="text-decoration-none text-primary" href="{{ route('admin.movie.get.edit', $item->id) }}">{{ $item->name }}</a>
                                </td>
                                <td>
                                    @foreach ($cate as $item_cate)
                                    @if ($item->cate_id == $item_cate->id)

                                    <a style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;" title="{{ $item_cate->cate_name }}" class="text-decoration-none text-primary" href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->day_release }}</td>
                                <td>
                                    @php
                                    $actress=0;
                                    $arr=explode(',',$item->actress);
                                    if (count($arr)==1) {
                                    $actress=1;
                                    }
                                    @endphp
                                    @if ($actress == 1)
                                    <span style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;" title="{{ $item->actress }}"><a href="{{ route('admin.list.search', ['search' => $item->actress]) }}" class="text-decoration-none text-primary">{{ $item->actress }}</a></span>
                                    @else
                                    <span style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;" title="{{ $item->actress }}">{{ $item->actress }}</span>
                                    @endif

                                </td>
                                <td>
                                    <img src="{{ $item->thumbnail }}" alt="" class="img-fluid w-50" style="cursor:pointer" onclick="onClick(this)" title="{{ $item->thumbnail }}&#010;Click to preview">
                                    @if ($item->seen == 0)
                                    <a href="{{ route('admin.movie.seen', $item->id) }}" class="ml-2 mr-2"><i class="fas fa-eye text-dark fa-lg mt-1"></i></a>
                                    @else
                                    <a href="{{ route('admin.movie.seen', $item->id) }}" class="ml-2 mr-2"><i class="fas fa-eye text-warning fa-lg mt-1"></i></a>
                                    @endif
                                    @if ($item->favourite == 1)
                                    <a href="{{ route('admin.movie.rate', $item->id) }}"><i class="fas fa-star text-warning fa-lg"></i></a>
                                    @else
                                    <a href="{{ route('admin.movie.rate', $item->id) }}"><i class="far fa-star text-dark fa-lg"></i></a>
                                    @endif
                                </td>
                                <td class="m-0 p-0">
                                    @if ($item->url)
                                    <a class="text-decoration-none text-danger" href="{{ $item->url }}" title="Mở trong tab mới" target="_blank"><b>View</b></a>
                                    @endif
                                    @if ($item->download)
                                    @if (strpos($item->download,'drive'))
                                    <a class="text-decoration-none text-success" href="{{ $item->download }}" title="Mở trong tab mới" target="_blank"><b>Down™</b></a>
                                    @else
                                    <a class="text-decoration-none text-success" href="{{ $item->download }}" title="Mở trong tab mới" target="_blank"><b>Down</b></a>
                                    @endif
                                    @endif
                                    @if ($item->subtitle)
                                    @if (strpos($item->subtitle,'drive'))
                                    <a class="text-decoration-none text-info" href="{{ $item->subtitle }}" title="Mở trong tab mới" target="_blank"><b>Sub™</b></a>
                                    @else
                                    <a class="text-decoration-none text-info" href="{{ $item->subtitle }}" title="Mở trong tab mới" target="_blank"><b>Sub</b></a>
                                    @endif
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="modal01" class="w3-modal" style="padding-top:15px !important" onclick="this.style.display='none'">
                        <div class="w3-modal-content w3-animate-zoom">
                            <img id="img01" style="width:100%">
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-center mt-4">
                    <ul>
                        {{ $movie->links() }}
                    </ul>
                </div>
            </div>
        </div>
        <!-- Content Row -->
    </div>
</div>
@endsection