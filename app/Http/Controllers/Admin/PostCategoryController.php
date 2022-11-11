<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategoryRequest;
use App\Models\DB\PostCategory;

class PostCategoryController extends Controller
{

    protected $paginate;
    protected $post_category;

    function __construct(PostCategory $post_category)
    {        
        // $this->middleware('auth');
        
        $this->post_category = $post_category;
        $this->post_category->visible = 1;

    }

    public function index()
    {

        $view = View::make('admin.pages.posts_categories.index')
            ->with('posts_category', $this->post_category)
            ->with('posts_categories', $this->post_category->where('active', 1)->get());

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
        ->with('posts_category', $this->post_category)
        ->with('posts_categories', $this->post_category->where('active', 1)->get())
        ->renderSections();

        return response()->json([
            'form' => $view['form'],
        ]);
    }

    public function store(PostCategoryRequest $request)
    {

        $post_category = PostCategory::updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->post_category->where('active', 1)->get())
        ->with('posts_category', $this->post_category)
        ->renderSections();

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $post_category->id        
        ]);
    }

    public function edit(PostCategory $post_category)
    {
                
        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->post_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('posts_category', $post_category);
        
        if(request()->ajax()) {
            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(PostCategory $post_category)
    {
        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_category', $post_category)
        ->with('posts_categories', $this->post_category->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(PostCategory $post_category)
    {   
        $post_category->active = 0;
        $post_category->save();

        $view = View::make('admin.pages.posts_categories.index')
        ->with('posts_categories', $this->post_category->where('active', 1)->get())
        ->with('posts_category', $this->post_category)
        // ->with('locale', $this->locale->create())
        // ->with('crud_permissions', $this->crud_permissions)
        ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }
}