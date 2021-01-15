@extends('admin.master')
@section('content')
@section('title', 'MinSite - Access Key')
    <div id="content" style="height: 500px" class="d-flex align-items-center">
        <div style="width: 300px" class="container mt-5 bg-gray-200 p-4 border border-bottom-primary border rounded">

            <!-- Page Heading -->
            <div class="mb-4">
                <h1 class="h3 mb-0 text-primary text-center"><b>ACCESS REQUIRE</b></h1>
                <form method="POST" autocomplete="off" enctype="multipart/form-data"
                    action="{{ route('admin.access.post') }}">
                    @csrf
                    <input type="password" class="form-control mt-3" autofocus placeholder="Press something cool!" required
                        name="access_key">
                    <input type="password" class="form-control mt-3" placeholder="Tell me, why are you here?" required
                        name="animal">
                    <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
                </form>
            </div>

            <!-- Content Row -->
        </div>
    </div>
@endsection
