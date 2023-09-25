<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Price;
use App\Models\DB\Therapy;
use App\Models\DB\Slide;
use App\Models\DB\Post;
use Debugbar;

class HomeController extends Controller
{
    protected $slider;
    protected $price;
    protected $therapy;

    public function __construct(Therapy $therapy, Price $price, Slide $slide, Post $post){
        
        $this->price = $price;
        $this->slide = $slide;
        $this->therapy = $therapy;
        $this->post = $post;
    }

    public function index()
    {
        $slider = $this->slide->where('active', 1)->where('visible', 1)->where('section', 'home')->orderBy('created_at', 'desc')->first();
        $slider->locale = $slider->locale()->where('language', app()->getLocale())->pluck('value','tag')->all();

        $therapies = $this->therapy->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get();

        foreach($therapies as $therapy){
            $therapy->locale = $therapy->locale()->where('language', app()->getLocale())->pluck('value','tag')->all();
        }
        
        $prices = $this->price->where('active', 1)->get();

        $post = $this->post->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->first();
        $post->locale = $post->locale()->where('language', app()->getLocale())->pluck('value','tag')->all();

        $view = View::make('front.pages.home.index')
                    ->with('slider', $slider)
                    ->with('therapies', $therapies)
                    ->with('post', $post)
                    ->with('prices', $prices);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;

        // if($this->agent->isMobile()){

        //     $slide = $this->slide->where('active', 1)->where('entity', 'home')->first();
        //     $home_slide = $slide->locale()->where('rel_profile', app()->getLocale())->pluck('value','tag')->all();

        //     $view = View::make('front.pages.home.index')
        //     ->with('home_slide', $home_slide)
        //     ->with('images_slide_mobile', $slide->images_slide_mobile);
        // }

        // if($this->agent->isDesktop()){

        //     $slide = $this->slide->where('active', 1)->where('entity', 'home')->first();
        //     $home_slide = $slide->locale()->where('rel_profile', app()->getLocale())->pluck('value','tag')->all();

        //     $post = $this->post->latest()->first();
        //     $featured_post = $post->locale()->where('rel_profile', app()->getLocale())->pluck('value','tag')->all();
        //     $featured_post['title'] = $post->seo()->first()->title;
        //     $featured_post['slug'] = $post->seo()->first()->slug;

        //     if(!empty($post->images_featured_desktop()->first())){
        //         $featured_post['image'] = $post->images_featured_desktop()->first()->path;
        //     }

        //     $view = View::make('front.pages.home.index')
        //     ->with('home_slide', $home_slide)
        //     ->with('images_slide_desktop', $slide->images_slide_desktop)
        //     ->with('featured_post', $featured_post);  
        // }

        // return $view;
    }

}