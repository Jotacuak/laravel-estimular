<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Posts;
use App\Models\DB\PostsCategory;
use Debugbar;

class BlogController extends Controller
{

    protected $posts;
    protected $posts_categories;

    public function __construct(Posts $posts, PostsCategory $posts_categories){
        
        $this->posts = $posts;
        $this->posts_categories = $posts_categories;
    }

    public function index()
    {
        $view = View::make('front.pages.blog.index')
        ->with('posts_categories',  $this->posts_categories->get())
        ->with('posts', $this->posts->get());
    
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

            Debugbar::info($sections['content']);

    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }
}