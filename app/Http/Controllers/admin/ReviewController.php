<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        Review::create([
            'name' => $request->name,
            'name_ru' => $request->name_ru,
            'image' => $request->image,
            'sound' => $request->sound,
            'video' => $request->video,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.review.index')->with('message', 'Review was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('admin.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        Review::find($id)->update([
            'name' => $request->name,
            'name_ru' => $request->name_ru,
            'image' => $request->image,
            'sound' => $request->sound,
            'video' => $request->video,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.review.index')->with('message', 'Review was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::destroy($id);
        return redirect()->route('admin.review.index')->with('message', 'Review was deleted');
    }
}
