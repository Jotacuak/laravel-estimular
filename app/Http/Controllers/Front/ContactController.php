<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\NewCostumerEmail;

class ContactController extends Controller
{

    public function index()
    {

        $view = View::make('front.pages.contact.index');
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    public function store(Request $request)
    {
        $this->dispatch(new NewCostumerEmail($request));

        return response()->json([
            'message' => 'Gracias por contactar con nosotros. En breve nos pondremos en contacto contigo.',
        ]);
    }
}