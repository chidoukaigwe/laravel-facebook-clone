<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as ResourcesPost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $post = request()->user()->posts()->create($data['data']['attributes']);

        return new ResourcesPost($post);

    }
}
