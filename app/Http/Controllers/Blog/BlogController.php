<?php

namespace App\Http\Controllers\Blog;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($category , $slug)
    {

       $post = Post::where([['slug', '=', $slug] , ['status', '=', 1] ])->first();
        if($post)
        {
            $related = Post::whereHas('PostCategory', function ($q) use ($post) {
                return $q->whereIn('name', $post->PostCategory->pluck('name'));
            })->where('id', '!=', $post->id)->get();


            $post->incrementReadCount();
            return view('site.Pages.Post.post-single' , compact('post' , 'related'));
        }
        else
        {
            return redirect()->back();
        }
    }

 

    
    public function index()
    {
        $posts = Post::where('status', '=', 1)->get();
        return view('site.Pages.Post.post-index' , compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
