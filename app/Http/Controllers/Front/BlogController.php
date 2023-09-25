<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\LocaleSlugSeo;
use App\Models\DB\Post;
use App\Models\DB\PostCategory;
use Debugbar;

class BlogController extends Controller
{

    protected $post;
    protected $post_category;
    protected $agent;
    protected $locale_slug_seo;

    public function __construct(Post $post, PostCategory $post_category, Agent $agent, LocaleSlugSeo $locale_slug_seo){
        
        $this->agent = $agent;
        $this->locale_slug_seo = $locale_slug_seo;
        $this->post = $post;
        $this->post_category = $post_category;

        $this->locale_slug_seo->setLanguage(app()->getLocale()); 
        $this->locale_slug_seo->setParent('posts');    
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

    public function show($slug)
    {
        $seo = $this->locale_slug_seo->getIdByLanguage($slug);

        if(isset($seo->key)){

            if($this->agent->isDesktop()){
                $post = $this->post
                    ->with('image_featured_desktop')
                    ->where('active', 1)
                    ->where('visible', 1)
                    ->find($seo->key);
            }
            
            elseif($this->agent->isMobile()){
                $post = $this->post
                    ->with('image_featured_mobile')
                    ->where('active', 1)
                    ->where('visible', 1)
                    ->find($seo->key);
            }

            $post['locale'] = $post->locale->pluck('value','tag');

            $view = View::make('front.pages.blog.single')->with('post', $post);

            if(request()->ajax()) {
    
                $sections = $view->renderSections(); 
        
                return response()->json([
                    'view' => $sections['content'],
                ]); 
            }

            return $view;

        }else{
            return response()->view('errors.404', [], 404);
        }
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