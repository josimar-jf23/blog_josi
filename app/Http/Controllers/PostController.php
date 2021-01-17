<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::where('status',2)->simplePaginate(8);
        return view('posts.index',compact('posts'));
    }
    public function show(Post $post){
        if($post->status=='1'){
            abort(404);
        }else{
            $similares=Post::where('category_id',$post->category_id)
                                ->where('status',2)
                                ->where('id','!=',$post->id)
                                ->latest('id')
                                ->take(4)
                                ->get();
            return view('posts.show',compact('post','similares'));
        }
    }
    public function category( Category $category){
        if($category->status=='1'){
            abort(404);
        }else{
            $posts=Post::where('category_id',$category->id)
                        ->where('status',2)
                        ->latest('id')
                        ->simplePaginate(6);
            return view('posts.category',compact('posts','category'));
        }
    }
    public function tag(Tag $tag){
        if($tag->status=='1'){
            abort(404);
        }else{
            $posts=$tag->posts()->where('status',2)->simplePaginate(6);
            return view('posts.tag',compact('posts','tag'));
        }
    }
}
