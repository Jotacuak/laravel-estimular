<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Therapy;

class TherapyController extends Controller
{

    protected $therapy;

    public function __construct(Therapy $therapy){
        
        $this->therapy = $therapy;
    }

    public function index()
    {
        $therapies = $this->therapy->get();

        $view = View::make('front.pages.therapy.index')
        ->with('therapies', $therapies);
    
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
        $therapy = $this->therapy->where('name', $name)->where('active', 1)->first();

        $view = View::make('front.pages.therapy.index')
        ->with('therapy', $therapy);

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }
}