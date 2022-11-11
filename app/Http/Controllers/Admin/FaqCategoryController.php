<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqCategoryRequest;
use App\Models\DB\FaqCategory;

class FaqCategoryController extends Controller
{

    protected $paginate;
    protected $faqs_category;

    function __construct(FaqCategory $faqs_category)
    {        
        // $this->middleware('auth');        
        $this->faqs_category = $faqs_category;
        $this->faqs_category->visible = 1;

    }

    public function index()
    {

        $view = View::make('admin.pages.faqs_categories.index')
                ->with('faqs_categories', $this->faqs_category->where('active', 1)->get())
                ->with('faqs_category', $this->faqs_category);

        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    public function create()
    {

        $view = View::make('admin.pages.faqs_categories.index')
        ->with('faqs_categories', $this->faqs_category->where('active', 1)->get())
        ->with('faqs_category', $this->faqs_category)
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(FaqCategoryRequest $request)
    {

        $faqs_category = FaqCategory::updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'visible' => request('visible') == "true" ? 1 : 0 ,
            'active' => 1,
        ]);

        $view = View::make('admin.pages.faqs_categories.index')
        ->with('faqs_categories', $this->faqs_category->where('active', 1)->get())
        ->with('faqs_category', $faqs_category)
        ->renderSections();

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $faqs_category->id        
        ]);
    }

    public function edit(FaqCategory $faqs_category)
    {
                
        $view = View::make('admin.pages.faqs_categories.index')
        ->with('faqs_category', $faqs_category)
        ->with('faqs_categories', $this->faqs_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));
        
        if(request()->ajax()) {
            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(FaqCategory $faqs_category)
    {
        $view = View::make('admin.pages.faqs_categories.index')
        ->with('faqs_category', $faqs_category)
        ->with('faqs_categories', $this->faqs_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(FaqCategory $faqs_category)
    {   
        $faqs_category->active = 0;
        $faqs_category->save();

        $view = View::make('admin.pages.faqs_categories.index')
        ->with('faqs_categories', $this->faqs_category->where('active', 1)->get())
        ->with('faqs_category', $this->faqs_category)
        // ->with('locale', $this->locale->create())
        // ->with('crud_permissions', $this->crud_permissions)
        ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}