<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\PseudoTypes\False_;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate = Cate::all();
        return view('admin.addMovie', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $movie = new Movie;
        $movie->code = $request->code;
        $movie->name = $request->name;
        $movie->day_release = $request->day_release;
        $movie->cate_id = $request->cate_id;
        $movie->subtitle = $request->subtitle;

        // $https = strpos($request->thumbnail, 'https');
        // if ($https !== false) {
        //     $movie->thumbnail = $request->thumbnail;
        // } else {
        //     $movie->thumbnail = str_replace('http', 'https', $request->thumbnail);
        // }

        $arr = explode(".", $request->thumbnail);
        $arrReverse = array_reverse($arr);
        $filename = $request->code . '.' . $arrReverse[0];
        $image = file_get_contents($request->thumbnail);
        file_put_contents(public_path('images/' . $filename), $image);
        $movie->thumbnail = 'public/images/' . $filename;

        $movie->actress = $request->actress;
        $movie->url = $request->url;
        if ($request->favourite == 1) {
            $movie->favourite = 1;
        } else {
            $movie->favourite = 0;
        }
        if ($request->seen == 1) {
            $movie->seen = 1;
        } else {
            $movie->seen = 0;
        }
        $movie->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate = Cate::all();
        $movie = Movie::find($id);
        return view('admin.editMovie', compact('movie', 'id', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $movie = Movie::find($id);
        $movie->code = $request->code;
        $movie->name = $request->name;
        $movie->day_release = $request->day_release;
        $movie->cate_id = $request->cate_id;
        $movie->subtitle = $request->subtitle;
        $movie->actress = $request->actress;
        // $https = strpos($request->thumbnail, 'https');
        // if ($https !== false) {
        //     $movie->thumbnail = $request->thumbnail;
        // } else {
        //     $movie->thumbnail = str_replace('http', 'https', $request->thumbnail);
        // }

        if ($movie->thumbnail != $request->thumbnail) {
            $arr = explode(".", $request->thumbnail);
            $arrReverse = array_reverse($arr);
            $filename = $request->code . '.' . $arrReverse[0];
            $image = file_get_contents($request->thumbnail);
            file_put_contents(public_path('images/' . $filename), $image);
            $movie->thumbnail = 'public/images/' . $filename;
        }

        $movie->url = $request->url;
        if ($request->favourite == 1) {
            $movie->favourite = 1;
        } else {
            $movie->favourite = 0;
        }
        if ($request->seen == 1) {
            $movie->seen = 1;
        } else {
            $movie->seen = 0;
        }
        $movie->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        echo '<script type="text/javascript">', 'history.go(-2);', '</script>';
    }
    public function rate($id)
    {
        $movie = Movie::find($id);
        if ($movie->favourite == 1) {
            $movie->favourite = 0;
        } else {
            $movie->favourite = 1;
        }
        $movie->save();
        return redirect()->back();
    }
    public function seen($id)
    {
        $movie = Movie::find($id);
        if ($movie->seen == 1) {
            $movie->seen = 0;
        } else {
            $movie->seen = 1;
        }
        $movie->save();
        return redirect()->back();
    }
    public function auto()
    {
        $movie = Movie::skip(1)->take(1)->get();
        foreach ($movie as $item) {
            $arr = explode(".", $item->thumbnail);
            $arrReverse = array_reverse($arr);
            $filename = $item->code . '.' . $arrReverse[0];
            $image = file_get_contents($item->thumbnail);
            file_put_contents(public_path('images/' . $filename), $image);
            $item->thumbnail = 'public/images/' . $filename;
            $item->save();
        }
        return $movie;
    }
}
