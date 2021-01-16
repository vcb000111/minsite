@extends('admin.master')
@section('content')
@section('title', 'MinSite - Thumbnail')

    <div id="content">
        <div class="container-fluid bg-gray-200 p-2 border border-bottom-primary border rounded">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">
                        <h4 class="text-center font-weight-bold mb-4">Thumbnail List Movie</h4>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <span><a href="{{ route('admin.index') }}"
                                            class="btn btn-sm btn-outline-primary shadow-sm mr-2">List</a></span>
                                    @if ($thumbnail == 1)

                                        <a href="{{ route('admin.thumbnail') }}"
                                            class="btn btn-sm btn-primary shadow-sm mr-2">Thumbnail</a>
                                        <a href="{{ route('admin.thumbnail.random') }}"
                                            class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                                            Random</a>
                                    @else <a href="{{ route('admin.thumbnail') }}"
                                            class="btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                                        <a href="{{ route('admin.thumbnail.random') }}"
                                            class="btn btn-sm btn-primary shadow-sm mr-2">Thumbnail
                                            Random</a>
                                    @endif
                                </ul>
                                <form class="form-inline input-group-sm" method="GET" id="myform"
                                    enctype="multipart/form-data" action="{{ route('admin.list.search') }}">
                                    <input type="text" class="form-control w-auto float-right mr-2" name="search"
                                        placeholder="Search list" required name="access_key">
                                </form>
                                <form class="form-inline input-group-sm" method="GET" id="myform"
                                    enctype="multipart/form-data" action="{{ route('admin.thumbnail.search') }}">
                                    <input type="text" class="form-control w-auto float-right mr-2" name="search"
                                        placeholder="Search thumbnail" required name="access_key">
                                </form>

                                @if ($seen == 0)
                                    @if ($favourite == 0)
                                        @if ($cate_id == 0)
                                            {{-- 1 --}}
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1']) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['favourite' => '1']) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.thumbnail', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            {{-- 2 --}}
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['favourite' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        @if ($cate_id == $item_cate->id)
                                                            <a class="dropdown-item active"
                                                                href="{{ route('admin.thumbnail', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.thumbnail', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @endif

                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        @if ($cate_id == 0)
                                            {{-- 3 --}}
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1']) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail') }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.thumbnail', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            {{-- 4 --}}
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        @if ($cate_id == $item_cate->id)
                                                            <a class="dropdown-item active"
                                                                href="{{ route('admin.thumbnail', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.thumbnail', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
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
                                            <a href="{{ route('admin.thumbnail') }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1']) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.thumbnail', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            {{-- 6 --}}
                                            <a href="{{ route('admin.thumbnail', ['cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        @if ($cate_id == $item_cate->id)
                                                            <a class="dropdown-item active"
                                                                href="{{ route('admin.thumbnail', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.thumbnail', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        {{-- 7 --}}
                                        @if ($cate_id == 0)
                                            <a href="{{ route('admin.thumbnail', ['favourite' => '1']) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1']) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            {{-- 8 --}}
                                            <a href="{{ route('admin.thumbnail', ['favourite' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                            <a href="{{ route('admin.thumbnail', ['seen' => '1', 'cate_id' => $cate_id]) }}"
                                                class="btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                            <div class="btn-group float-right shadow-sm">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Category
                                                </button>
                                                <div class="dropdown-menu">
                                                    @foreach ($cate as $item_cate)
                                                        @if ($cate_id == $item_cate->id)
                                                            <a class="dropdown-item active"
                                                                href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.thumbnail', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    @endif
                                @endif

                                <a href="{{ route('admin.movie.add') }}"
                                    class="btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                                    Movie</a>
                                <a href="{{ route('admin.cate.add') }}"
                                    class="btn btn-sm btn-outline-primary shadow-sm mr-2">Create
                                    Category</a>
                                <a href="{{ route('admin.access.exit') }}" class="btn btn-sm btn-danger shadow-sm">Exit</a>

                            </div>
                        </nav>

                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="row d-flex align-items-center justify-content-center">
                        @foreach ($movie as $item)
                            @foreach ($cate as $item_cate)
                                @if ($item->cate_id == $item_cate->id)
                                    <div class="col-md-3 mb-1">
                                        <div class="mb-2">
                                            <div class="">
                                                <img style="cursor:pointer" onclick="onClick(this)"
                                                    title=" Code: {{ $item->code }}&#010;Title: {{ $item->name }}&#010;Category: {{ $item_cate->cate_name }}&#010;Actress: {{ $item->actress }}&#010;Day release: {{ $item->day_release }}&#010;Day added: {{ $item->day_add }}"
                                                    src="{{ $item->thumbnail }}" class="img-fluid" alt="">
                                                <div class=""
                                                    style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                                    <div class="text-center">
                                                        <a href="{{ route('admin.movie.get.edit', $item->id) }}"
                                                            class="card-link text-dark font-weight-bold"
                                                            title="Code: {{ $item->code }}&#010;Title: {{ $item->name }}&#010;Category: {{ $item_cate->cate_name }}&#010;Actress: {{ $item->actress }}&#010;Day release: {{ $item->day_release }}&#010;Day added: {{ $item->day_add }}">
                                                            {{ $item->code }} {{ $item->name }}</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    @if ($item->url)
                                                        <a href="{{ $item->url }}" type="button" target="_blank"
                                                            class="btn btn-outline-primary btn-sm">Url</a>
                                                    @endif
                                                    @if ($item->subtitle)
                                                        <a href="{{ $item->subtitle }}" type="button" target="_blank"
                                                            class="btn btn-outline-danger btn-sm">Sub</a>
                                                    @endif
                                                    @if ($item->favourite == 1)
                                                        <a href="{{ route('admin.movie.rate', $item->id) }}"><i
                                                                class="fas fa-star text-warning fa-lg float-right mt-2"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.movie.rate', $item->id) }}"><i
                                                                class="far fa-star fa-lg float-right mt-2"></i></a>
                                                    @endif
                                                    @if ($item->seen == 0)
                                                        <a href="{{ route('admin.movie.seen', $item->id) }}"
                                                            class="ml-2 mr-2 float-right" style="padding-top: 6px"><i
                                                                class="fas fa-eye fa-lg"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.movie.seen', $item->id) }}"
                                                            class="ml-2 mr-2 float-right" style="padding-top: 6px"><i
                                                                class="fas fa-eye text-warning fa-lg"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        <div id="modal01" class="w3-modal" style="padding-top:15px !important"
                            onclick="this.style.display='none'">
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
    <script>
        $("#myform").on("submit", function() {
            event.preventDefault();
            let formData = $(this).serialize();

            let fullUrl = window.href.location;
            let queryPart = fullUrl.split("?")[1];

            let finalForm = queryPart + "&"
            formData;
        });

    </script>
@endsection
