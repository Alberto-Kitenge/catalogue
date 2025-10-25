<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        return $this->postsView($request->search ? ['search' => $request->search] : []);
    }

    public function postsByCategory(Category $category): View
    {
        return $this->postsView(['category' => $category]);
    }

    public function postsByTag(Tag $tag): View
    {
        // $posts_tags = $tag->posts->latest()->paginate(5);

        /* $posts_tags = Post::whereRelation(
            'tags', 'tags.id', $tag->id
        )->latest()->paginate(5); */

        return $this->postsView(['tag' => $tag]);
    }

    protected function postsView(array $filters): View
    {
        return view('posts.index', [
            'posts' => Post::filters($filters)->latest()->paginate(5),
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
