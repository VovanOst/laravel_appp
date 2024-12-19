<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $post = (object)[
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
        ];

        $posts = array_fill(0, 10, $post);
       // $posts= (object)[];

        return view('user.posts.index', compact('posts'));
    }

    public function show($post)
    {
        return 'Один пост в блоге';
    }

    public function like($post)
    {
        return 'Поставить лайк';
    }
}
