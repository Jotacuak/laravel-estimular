<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Therapies;

class TherapyController extends Controller
{

    protected $therapies;

    public function __construct(Therapies $therapies){
        
        $this->therapies = $therapies;
    }

    public function index()
    {
        $therapies = $this->therapies->get();

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
        $therapy = $this->therapies->where('name', $name)->first();

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