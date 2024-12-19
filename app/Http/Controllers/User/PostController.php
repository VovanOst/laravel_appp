<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
            'published_at'=>now(),
        ];

        $posts = array_fill(0, 10, $post);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view("user.posts.create");
    }

    public function store(Request $request)
    {   $title=$request->input('title');
        $content=$request->input('content');
        dd($title,$content);
        return 'Запрос создание поста';
    }

    public function show($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
            'published_at'=>now(),
        ];
      //  $posts = array_fill(0, 10, $post);
        return view("user.posts.show",compact('post'));
    }

    public function edit($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
            'published_at'=>now(),
            'published'=>true,
        ];
        return view("user.posts.edit", compact('post'));
    }

    public function update()
    {
        return 'Запрос изменение поста';
    }

    public function delete()
    {
        return 'Запрос удаление поста';
    }

    public function like()
    {
        return 'Лайк + 1';
    }
}
