<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Prices;
use App\Models\DB\Therapies;
use App\Models\DB\Slide;
use App\Models\DB\Posts;

class HomeController extends Controller
{
    protected $slider;
    protected $prices;
    protected $therapy;

    public function __construct(Therapies $therapy, Prices $prices, Slide $slide, Posts $post){
        
        $this->prices = $prices;
        $this->slide = $slide;
        $this->therapy = $therapy;
        $this->post = $post;
    }

    public function index()
    {
        $slider = $this->slide->where('active', 1)->where('visible', 1)->where('section', 'home')->orderBy('created_at', 'desc')->first();
        $therapies = $this->therapy->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get();
        $prices = $this->prices->where('active', 1)->get();
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