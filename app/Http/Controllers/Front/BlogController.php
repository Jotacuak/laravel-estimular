<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor\Image\Image;
use App\Models\DB\Posts;
use App\Models\DB\PostsCategory;

class BlogController extends Controller
{

    protected $posts;
    protected $posts_categories;
    protected $image;

    public function __construct(Posts $posts, PostsCategory $posts_categories, Image $image){
        
        $this->posts = $posts;
        $this->posts_categories = $posts_categories;
    }

    public function index()
    {
        $view = View::make('front.pages.blog.index')
        ->with('posts_categories',  $this->posts_categories->get())
        ->with('posts', $this->posts->with('image_featured_desktop')->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get());

        $posts = $this->posts->with('image_featured_desktop')->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get();
    
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
        $post = $this->posts->where('name', $name)->first();

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
        $post_category = $this->posts_categories->where('name', $name)->first();
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