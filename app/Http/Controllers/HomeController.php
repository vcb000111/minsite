<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Cate;
use App\Idol;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        $movieTotal = Movie::all();
        $cate = Cate::all();
        $search = '';
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(100);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->orderBy("updated_at", "desc")->paginate(100);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
        }
        if ($request->actress) {
        }
        $movie = Movie::latest()->paginate(100);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.index', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'movieTotal'));
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
        $search = '';
        $movieTotal = Movie::all();
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        $movie = Movie::latest()->paginate(40);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
    }
    public function thumbnailSearch(Request $request)
    {
        $movie = Movie::where('name', 'like', '%' . $request->search . '%')->orWhere('code', 'like', '%' . $request->search . '%')->orWhere('actress', 'like', '%' . $request->search . '%')->latest()->paginate(40);
        $cate = Cate::all();
        $movieTotal = Movie::all();
        $cate_id = 0;
        $search = $request->search;
        $favourite = 0;
        $seen = 0;
        $thumbnail = 1;
        $movie->appends(['search' => $request->search])->links();
        return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'search', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
    }
    public function listSearch(Request $request)
    {
        $cate = Cate::all();
        $cate_id = 0;
        $favourite = 0;
        $seen = 0;
        $movie = Movie::where('name', 'like', '%' . $request->search . '%')->orWhere('code', 'like', '%' . $request->search . '%')->orWhere('actress', 'like', '%' . $request->search . '%')->latest()->paginate(40);
        $search = $request->search;
        $movie->appends(['search' => $request->search])->links();
        return view('admin.index', compact('movie', 'cate', 'cate_id', 'search', 'favourite', 'seen'));
    }
    public function thumbnailRandom(Request $request)
    {
        $movieTotal = Movie::all();
        $thumbnail = 0;
        $cate = Cate::all();
        $search = '';
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->cate_id) {
            $movie = Movie::where('cate_id', $request->cate_id)->latest()->paginate(40);
            $seen = 0;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->favourite) {
            $movie = Movie::where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
        }
        $movie = Movie::inRandomOrder()->latest()->paginate(40);
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.thumbnail', compact('search', 'movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'movieTotal'));
    }
    public function thumbnailFap(Request $request)
    {
        $movieTotal = Movie::all();
        $thumbnail = 0;
        $cate = Cate::all();
        if ($request->seen && $request->favourite && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'favourite' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->favourite) {
            $movie = Movie::where('seen', 1)->where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['seen' => '1', 'favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen && $request->cate_id) {
            $movie = Movie::where('seen', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = $request->cate_id;
            $movie->appends(['seen' => '1', 'cate_id' => $request->cate_id])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->favourite && $request->cate_id) {
            $movie = Movie::where('favourite', 1)->where('cate_id', $request->cate_id)->orderBy("updated_at", "desc")->paginate(40);
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
            $movie = Movie::where('favourite', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 0;
            $favourite = 1;
            $cate_id = 0;
            $movie->appends(['favourite' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        if ($request->seen) {
            $movie = Movie::where('seen', 1)->orderBy("updated_at", "desc")->paginate(40);
            $seen = 1;
            $favourite = 0;
            $cate_id = 0;
            $movie->appends(['seen' => '1'])->links();
            return view('admin.thumbnail', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
        }
        $movie = Movie::inRandomOrder()->limit(4)->get();
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        return view('admin.fap', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail'));
    }
    public function idols(Request $request)
    {
        $idols = Idol::inRandomOrder()->get();
        $movie = Movie::all();
        $cate = Cate::all();
        $favourite = 0;
        $cate_id = 0;
        $seen = 0;
        $search = '';
        $thumbnail = '';
        return view('admin.idols', compact('movie', 'cate', 'cate_id', 'favourite', 'seen', 'thumbnail', 'search', 'idols'));
    }
    public function add_idol_get()
    {
        # code...
        return view('admin.addIdol');
    }
    public function add_idol_post(Request $request)
    {
        # code...
        $idol = new Idol;
        $idol->idol_name = $request->idol_name;
        $uploadedFileUrl = cloudinary()->uploadFile($request->idol_thumbnail, array("overwrite" => true))->getPublicId();
        $rename = cloudinary()->rename($uploadedFileUrl, $request->idol_name, array("overwrite" => true));
        $idol->idol_thumbnail = $rename['secure_url'];
        $idol->save();
        return redirect()->route('admin.idols');
    }
    public function edit_idol_get($id)
    {
        # code...
        $idol = Idol::find($id);
        return view('admin.editIdol', compact('idol'));
    }
    public function edit_idol_post(Request $request, $id)
    {
        # code...
        $idol = Idol::find($id);
        $idol->idol_name = $request->idol_name;
        if ($idol->idol_thumbnail != $request->idol_thumbnail) {
            $uploadedFileUrl = cloudinary()->uploadFile($request->idol_thumbnail, array("overwrite" => true))->getPublicId();
            $rename = cloudinary()->rename($uploadedFileUrl, $request->idol_name, array("overwrite" => true));
            $idol->idol_thumbnail = $rename['secure_url'];
        }
        $idol->save();
        return redirect()->route('admin.idols');
    }
}
