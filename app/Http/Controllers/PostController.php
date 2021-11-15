<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'title' => 'required|string',
                'description' => 'required|string',
                'content' => 'required|string',
                'site' => 'exists:sites,id'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
            ], 400);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->site = $request->site;

        if ($this->site->posts()->save($post)) {
            event (new NewPost($post));
            return response()->json([
                    'status' => true,
                    'message'   => 'The post was created successfully',
            ], 200);
        } else {
            return response()->json([
                    'status'  => false,
                    'message' => 'Sorry, the post could not be created.',
            ], 200);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
