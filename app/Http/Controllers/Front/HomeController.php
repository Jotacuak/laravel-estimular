<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Price;
use App\Models\DB\Therapy;
use App\Models\DB\Slide;
use App\Models\DB\Post;

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
        $therapies = $this->therapy->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get();
        $prices = $this->price->where('active', 1)->get();
        $post = $this->post->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->first();

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
    }

}