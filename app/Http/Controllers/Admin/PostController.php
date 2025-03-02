<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\Locale;
use App\Vendor\Locale\LocaleSlugSeo;
use App\Http\Requests\Admin\PostRequest;
use App\Vendor\Image\Image;
use App\Models\DB\Post; 

class PostController extends Controller
{
    protected $agent;
    protected $locale;
    protected $locale_slug_seo;
    protected $image;
    protected $paginate;
    protected $post;

    function __construct(Post $post, Locale $locale, LocaleSlugSeo $locale_slug_seo, Agent $agent, Image $image)
    {
        $this->middleware('auth');
        $this->agent = $agent;
        $this->image = $image;
        $this->locale = $locale;
        $this->locale_slug_seo = $locale_slug_seo;
        $this->post = $post;
        $this->post->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }

        $this->locale->setParent('posts');
        $this->locale_slug_seo->setParent('posts');
        $this->image->setEntity('posts');
    }

    public function index()
    {
        $view = View::make('admin.pages.posts.index')
        ->with('post', $this->post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

    
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
        $view = View::make('admin.pages.posts.index')
        ->with('post', $this->post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(PostRequest $request)
    {            
                
        $post = $this->post->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'author' => request('author'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
            'category_id' => request('category_id'),
        ]);

        if (request('id')){
            $message = \Lang::get('admin/posts.posts-update');
        }else{
            $message = \Lang::get('admin/posts.posts-create');
        }

        if(request('seo')){
            $seo = $this->locale_slug_seo->store(request('seo'), $post->id, 'front_post');
        }

        if(request('locale')){
            $locale = $this->locale->store(request('locale'), $post->id);
        }

        if(request('images')){
            $images = $this->image->store(request('images'), $post->id);
        }

        $view = View::make('admin.pages.posts.index')
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('post', $this->post)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Post $post)
    {

        $locale = $this->locale->show($post->id);
        $seo = $this->locale_slug_seo->show($post->id);

        $view = View::make('admin.pages.posts.index')
        ->with('locale', $locale)
        ->with('seo', $seo)
        ->with('post', $post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Post $post){

        $view = View::make('admin.pages.posts.index')
        ->with('post', $post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Post $post)
    {
        $this->locale->delete($post->id);
        $this->locale_slug_seo->delete($post->id);
        $this->image->delete($post->id);
        $post->active = 0;
        $post->save();

        $message = \Lang::get('admin/posts.post-delete');

        $view = View::make('admin.pages.posts.index')
        ->with('post', $this->post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->posts->query();

        if($filters != null){

            $query->when($filters->category_id, function ($q, $category_id) {

                if($category_id == 'all'){
                    return $q;
                }
                else{
                    return $q->where('category_id', $category_id);
                }
            });
    
            $query->when($filters->search, function ($q, $search) {
    
                if($search == null){
                    return $q;
                }
                else {
                    return $q->where('posts.name', 'like', "%$search%");
                }   
            });
    
            $query->when($filters->created_at_from, function ($q, $created_at_from) {
    
                if($created_at_from == null){
                    return $q;
                }
                else {
                    $q->whereDate('posts.created_at', '>=', $created_at_from);
                }   
            });
    
            $query->when($filters->created_at_since, function ($q, $created_at_since) {
    
                if($created_at_since == null){
                    return $q;
                }
                else {
                    $q->whereDate('posts.created_at', '<=', $created_at_since);
                }   
            });
    
            $query->when($filters->order, function ($q, $order) use ($filters) {
    
                $q->orderBy($order, $filters->direction);
            });
        }
    
        $posts = $query->where('posts.active', 1)
                ->orderBy('posts.created_at', 'desc')
                ->paginate($this->paginate)
                ->appends(['filters' => json_encode($filters)]);   

        $view = View::make('admin.pages.posts.index')
            ->with('posts', $posts)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }
}