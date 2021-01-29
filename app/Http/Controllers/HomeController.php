<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Cate;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        $cate = Cate::all();
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(100);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->latest()->paginate(100);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->latest()->paginate(100);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(100);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(100);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->latest()->paginate(100);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->latest()->paginate(100);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
        }
        if ($request->actress) {
        }
        $movie = Movie::latest()->paginate(100);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.index', compact('movie', 'cate', 'cate_id', 'favourite', 'seen'));
    }
    public function access()
    {
        return view('admin.access');
    }
    public function accessPost(Request $request)
    {
        if ($request->access_key == "nlacbdmndnpm0" && $request->animal == "ma") {
            $request->session()->push('accessable', "nlacbdmndnpm0@ma");
            return redirect()->route('admin.index');
        } else
            return redirect()->back();
    }
    public function exit(Request $request)
    {
        $request->session()->forget('accessable');
        return redirect()->route('admin.access');
    }
    public function thumbnail(Request $request)
    {
        $thumbnail = 1;
        $cate = Cate::all();
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->latest()->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->latest()->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->latest()->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        $movie = Movie::latest()->paginate(40);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
    }
    public function thumbnailSearch(Request $request)
    {
        $movie = Movie::where('name', 'like', '%' . $request->search . '%')->orWhere('code', 'like', '%' . $request->search . '%')->orWhere('day_release', 'like', '%' . $request->search . '%')->orWhere('actress', 'like', '%' . $request->search . '%')->orWhere('url', 'like', '%' . $request->search . '%')->orWhere('subtitle', 'like', '%' . $request->search . '%')->latest()->paginate(40);
        $cate = Cate::all();
        $cate_id = 0;
        $search = $request->search;
        $favourite = 0;
        $seen = 0;
        $thumbnail = 1;
        $movie->appends(['search' => $request->search])->links();
        return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'search', 'favourite', 'seen', 'thumbnail'));
    }
    public function listSearch(Request $request)
    {
        $cate = Cate::all();
        $cate_id = 0;
        $favourite = 0;
        $seen = 0;
        if ($request->actress) {
            $movie = Movie::where('actress', 'like', '%' . $request->actress . '%')->latest()->paginate(100);
            $search = '';
            $movie->appends(['actress' => $request->actress])->links();
        } else {
            $movie = Movie::where('name', 'like', '%' . $request->search . '%')->orWhere('code', 'like', '%' . $request->search . '%')->orWhere('day_release', 'like', '%' . $request->search . '%')->orWhere('actress', 'like', '%' . $request->search . '%')->orWhere('url', 'like', '%' . $request->search . '%')->orWhere('subtitle', 'like', '%' . $request->search . '%')->latest()->paginate(100);
            $search = $request->search;
            $movie->appends(['search' => $request->search])->links();
        }
        return view('admin.index', compact('movie', 'cate', 'cate_id', 'search', 'favourite', 'seen'));
    }
    public function thumbnailRandom(Request $request)
    {
        $thumbnail = 0;
        $cate = Cate::all();
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->latest()->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->latest()->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->latest()->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        $movie = Movie::inRandomOrder()->latest()->paginate(40);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
    }
}
