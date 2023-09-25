<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Worker;

class TeamController extends Controller
{

    public function index()
    {

        $worker = Worker::where('active', 1)->where('visible', 1)->orderBy('created_at', 'desc')->first();
        $worker->locale = $worker->locale()->where('language', app()->getLocale())->pluck('value','tag')->all();
        $view = View::make('front.pages.team.index')
                    ->with('worker', $worker);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}