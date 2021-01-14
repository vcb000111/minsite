@extends('admin.master')
@section('content')
@section('title', 'MinSite - List')

    <div id="content">
        <div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">
                        <h4 class="text-center font-weight-bold mb-4">List Movie</h4>
                        <span><a href="{{ route('admin.index') }}"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">List</a></span>
                        <a href="{{ route('admin.thumbnail') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail</a>
                        <a href="{{ route('admin.thumbnail.random') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Thumbnail
                            Random</a>
                        <a href="{{ route('admin.access.exit') }}"
                            class="float-right d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Exit</a>
                        <a href="{{ route('admin.cate.add') }}"
                            class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Create
                            Category</a>
                        <a href="{{ route('admin.movie.add') }}"
                            class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm mr-2">Add
                            Movie</a>

                        @if ($seen == 0)
                            @if ($favourite == 0)
                                @if ($cate_id == 0)
                                    {{-- 1 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['favourite' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['seen' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                @else
                                    {{-- 2 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                @if ($cate_id == $item_cate->id)
                                                    <a class="dropdown-item active"
                                                        href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.index', ['cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                @endif
                            @else
                                @if ($cate_id == 0)
                                    {{-- 3 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index') }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                @else
                                    {{-- 4 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                @if ($cate_id == $item_cate->id)
                                                    <a class="dropdown-item active"
                                                        href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Seen</a>
                                @endif
                            @endif
                        @else
                            @if ($favourite == 0)
                                @if ($cate_id == 0)
                                    {{-- 5 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index') }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                @else
                                    {{-- 6 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                @if ($cate_id == $item_cate->id)
                                                    <a class="dropdown-item active"
                                                        href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                @endif
                            @else
                                {{-- 7 --}}
                                @if ($cate_id == 0)
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['seen' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['favourite' => '1']) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                @else
                                    {{-- 8 --}}
                                    <div class="btn-group float-right shadow-sm">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle mr-2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($cate as $item_cate)
                                                @if ($cate_id == $item_cate->id)
                                                    <a class="dropdown-item active"
                                                        href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.index', ['seen' => '1', 'favourite' => '1', 'cate_id' => $item_cate->id]) }}">{{ $item_cate->cate_name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.index', ['seen' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Favourite</a>
                                    <a href="{{ route('admin.index', ['favourite' => '1', 'cate_id' => $cate_id]) }}"
                                        class="float-right d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">Seen</a>
                                @endif

                            @endif
                        @endif
                        <form style="display:inline" class="input-group-sm" method="GET" id="myform"
                            enctype="multipart/form-data" action="{{ route('admin.list.search') }}">
                            <input type="text" class="form-control w-auto float-right mr-2" name="search"
                                placeholder="Search" required name="access_key">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center text-dark" id="dataTable"
                            width="100%">
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
                                            <span title="{{ $item->code }}"
                                                style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                                {{ $item->code }}</span>
                                        </td>
                                        <td><a style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                                                title="{{ $item->name }}" class="text-decoration-none text-primary"
                                                href="{{ route('admin.movie.get.edit', $item->id) }}">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            @foreach ($cate as $item_cate)
                                                @if ($item->cate_id == $item_cate->id)
                                                    {{ $item_cate->cate_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->day_release }}</td>
                                        <td>
                                            <span
                                                style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                                                title="{{ $item->actress }}">{{ $item->actress }}</span>
                                        </td>
                                        <td>
                                            <img src="{{ $item->thumbnail }}" alt="" class="img-fluid w-50"
                                                style="cursor:pointer" onclick="onClick(this)">
                                            @if ($item->seen == 0)
                                                <a href="{{ route('admin.movie.seen', $item->id) }}" class="ml-2 mr-2"><i
                                                        class="fas fa-eye fa-lg"></i></a>
                                            @else
                                                <a href="{{ route('admin.movie.seen', $item->id) }}" class="ml-2 mr-2"><i
                                                        class="fas fa-eye text-warning fa-lg"></i></a>
                                            @endif
                                            @if ($item->favourite == 1)
                                                <a href="{{ route('admin.movie.rate', $item->id) }}"><i
                                                        class="fas fa-star text-warning fa-lg"></i></a>
                                            @else
                                                <a href="{{ route('admin.movie.rate', $item->id) }}"><i
                                                        class="far fa-star fa-lg"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->url)
                                                <a class="text-decoration-none text-primary" href="{{ $item->url }}"
                                                    title="Mở trong tab mới" target="_blank"><b>View</b></a>
                                            @endif
                                            @if ($item->subtitle)
                                                <a class="text-decoration-none text-primary" href="{{ $item->subtitle }}"
                                                    title="Mở trong tab mới" target="_blank"><b>Sub</b></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
