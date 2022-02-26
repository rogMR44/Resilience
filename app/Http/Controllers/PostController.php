<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::where('status',2)->latest('id')->paginate(10);
        return view('blog.index',compact('posts','categories'));
    }
    
    public function show(Post $post){
        $similares = Post::where('category_id',$post->category_id)
                            ->where('status',2)
                            ->where('id','!=',$post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('blog.show',compact('post','similares'));
    }
    
    public function category(Category $category){
        $categories = Category::all();
        $posts = Post::where('category_id',$category->id)
                        ->where('status',2)
                        ->latest('id')
                        ->paginate(4);
        return view('blog.category',compact('posts','category','categories'));
    }

    public function tag(Tag $tag){
        $tags = Tag::all();
        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);
        return view('blog.tag',compact('posts','tag','tags'));
    }
}