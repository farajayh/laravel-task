<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Site;

use App\Events\NewPost;

use App\Console\Commands\SendEmail;

use Illuminate\Http\Request;
use Validator;
use Artisan;

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
        $site = Site::find($request->site);

        if ($site->posts()->save($post)) {
            NewPost::dispatch($post);
            return response()->json([
                    'status' => true,
                    'message'   => 'The post was created successfully',
                    'post' => array(
                        'id' => $post->id,
                        'title' => $post->title,
                        'description' =>  $post->description,
                        'content' => $post->content,
                        'site'=> $post->site_id,
                        'created_at' => $post->created_at,
                        'update_at' => $post->updated_at
                    )
            ], 201);
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
