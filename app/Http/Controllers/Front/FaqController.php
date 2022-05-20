<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Faq;

class FaqController extends Controller
{
    protected $faq;

    function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        $view = View::make('front.pages.faqs.index')
        ->with('faqs', $this->faq->where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->get());

        return $view;
    }

    public function show($name)
    {
        $faq = $this->faqs->where('name', $name)->first();

        $view = View::make('front.pages.faqs.index')
        ->with('faq', $faq);

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}