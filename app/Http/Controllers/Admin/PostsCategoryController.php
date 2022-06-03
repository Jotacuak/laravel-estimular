<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsCategoryRequest;
use App\Models\DB\PostsCategory;

class PostsCategoryController extends Controller
{

    protected $paginate;
    protected $posts_category;

    function __construct(PostsCategory $posts_category)
    {        
        // $this->middleware('auth');
        
        $this->posts_category = $posts_category;
        $this->posts_category->visible = 1;

    }

    public function index()
    {

        $view = View::make('admin.pages.posts_categories.index')
            ->with('posts_category', $this->posts_category)
            ->with('posts_categories', $this->posts_category->where('active', 1)->get());

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

        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_category', $this->posts_category)
        ->with('posts_categories', $this->posts_category->where('active', 1)->get())
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(PostsCategoryRequest $request)
    {

        $posts_category = PostsCategory::updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->posts_category->where('active', 1)->get())
        ->with('posts_category', $this->posts_category)
        ->renderSections();

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $posts_category->id        
        ]);
    }

    public function edit(PostsCategory $posts_category)
    {
                
        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->posts_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('posts_category', $posts_category);
        
        if(request()->ajax()) {
            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(PostsCategory $posts_category)
    {
        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_category', $posts_category)
        ->with('posts_categories', $this->posts_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(PostsCategory $posts_category)
    {   
        $posts_category->active = 0;
        $posts_category->save();

        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->posts_category->where('active', 1)->get())
        ->with('posts_category', $this->posts_category)
        // ->with('locale', $this->locale->create())
        // ->with('crud_permissions', $this->crud_permissions)
        ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}