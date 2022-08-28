<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\PostsRequest;
use App\Vendor\Image\Image;
use App\Models\DB\Posts; 

class PostsController extends Controller
{
    protected $agent;
    protected $image;
    protected $paginate;
    protected $post;

    function __construct(Posts $post, Agent $agent, Image $image)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->image = $image;
        $this->post = $post;
        $this->post->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }

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

    public function store(PostsRequest $request)
    {            
                
        $post = $this->post->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'author' => request('author'),
            'sumary' => request('sumary'),
            'description' => request('description'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
            'category_id' => request('category_id'),
        ]);

        if (request('id')){
            $message = \Lang::get('admin/posts.posts-update');
        }else{
            $message = \Lang::get('admin/posts.posts-create');
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

    public function edit(Posts $post)
    {
        $view = View::make('admin.pages.posts.index')
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

    public function show(Posts $post){

        $view = View::make('admin.pages.posts.index')
        ->with('post', $post)
        ->with('posts', $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Posts $post)
    {
        $this->image->delete($faq->id);
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