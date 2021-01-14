@extends('admin.master')
@section('content')
@section('title','MySite - Category')
<div id="content">
    <div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">

        <!-- Page Heading -->
        <div class="mb-4">
            <h1 class="h3 mb-0 text-primary text-center"><b>{{ $cate_name->cate_name }} List</b></h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    <span><a href="{{ route('admin.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">List</a></span>
                    <a href="{{ route('admin.thumbnail') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2">Thumbnail</a>
                    <span class="ml-2">{{ $cate_name->cate_name }} List Movie</span>

                    <a href="{{ route('admin.access.exit') }}" class="float-right d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Exit</a>
                    <a href="{{ route('admin.cate.add') }}" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">Create Category</a>
                    <a href="{{ route('admin.movie.add') }}" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2">Add Movie</a>
                    <div class="btn-group float-right shadow-sm">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($cate as $item_cate)
                            <a class="dropdown-item" href="{{ route('admin.movie.cate',$item_cate->id) }}">{{ $item_cate->cate_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                                <td>{{ $item->code }}</td>
                                <td><a class="text-decoration-none text-primary" href="{{ route('admin.movie.get.edit',$item->id) }}">{{$item->name}}</a></td>
                                <td>
                                    @foreach ($cate as $item_cate)
                                    @if ($item->cate_id==$item_cate->id)
                                    {{ $item_cate->cate_name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{$item->day_release}}</td>
                                <td>{{$item->actress}}</td>
                                <td>
                                    <img src="{{$item->thumbnail}}" alt="" class="img-fluid w-50" style="cursor:pointer" onclick="onClick(this)">
                                </td>
                                <td>
                                    <a class="text-decoration-none text-primary" href="{{$item->url}}" title="Mở trong tab mới" target="_blank"><b>View</b></a>
                                    @if ($item->subtitle)
                                    <a class="text-decoration-none text-primary" href="{{$item->subtitle}}" title="Mở trong tab mới" target="_blank"><b>Sub</b></a>
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
            </div>
        </div>
        <!-- Content Row -->
    </div>
</div>
@endsection