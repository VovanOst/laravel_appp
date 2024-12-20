<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BlogController extends Controller
{
    public function index(Request $request)
    {

        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($fromDate = $validated['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($toDate));
        }

        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }

        $posts = $query->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact('posts'));
       // return view('user.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return 'Поставить лайк';
    }
}
/*use App\Models\Post;
use App\Models\User;
for($i=0; $i<99;$i++){
    Post::query()->create(['user_id'=>User::query()->value('id'),
        'title'=>fake()->sentence(),
        'content'=>fake()->paragraph(),
        'published'=> true,
        'published_at'=>fake()->dateTimeBetween(now()->subYear(),now()),
    ]);
}
echo 'ok';*/


