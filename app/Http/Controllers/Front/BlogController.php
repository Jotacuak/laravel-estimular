<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Posts;
// use App\Models\DB\PostsCategory;

class BlogController extends Controller
{

    protected $posts;
    // protected $posts_categories;

    public function __construct(Posts $posts){
        $this->posts = $posts;
        // $this->posts_categories = $posts_categories;
    }

    public function index()
    {

        $view = View::make('front.pages.blog.index');
    
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

}