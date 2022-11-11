<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor\Image\Image;
use App\Models\DB\Post;
use App\Models\DB\PostCategory;

class BlogController extends Controller
{

    protected $post;
    protected $post_category;
    protected $image;

    public function __construct(Post $post, PostCategory $post_category, Image $image){
        
        $this->post = $post;
        $this->post_category = $posts_category;
    }

    public function index()
    {
        $view = View::make('front.pages.blog.index')
        ->with('posts_categories',  $this->post_category->get())
        ->with('posts', $this->post->with('image_featured_desktop')->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get());

        $posts = $this->post->with('image_featured_desktop')->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get();
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    public function show($name)
    {
        $post = $this->post->where('name', $name)->first();

        $view = View::make('front.pages.blog.index')
        ->with('post', $post);

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    public function categoryFilter($name)
    {
        $post_category = $this->post_category->where('name', $name)->first();
        $posts = $post_category->posts()->get();
        
        $view = View::make('front.pages.blog.index')
        ->with('posts', $posts);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 

            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }
}