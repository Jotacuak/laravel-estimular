<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Models\DB\User;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    protected $agent;
    protected $user;

    public function __construct(User $user, Agent $agent)
    {
        $this->middleware('auth');
        $this->agent = $agent;
        $this->user = $user;
        $this->user->visible = 1;
    }

    public function index()
    {

        $view = View::make('admin.pages.users.index')
                ->with('user', $this->user)
                ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

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
        $view = View::make('admin.pages.users.index')
        ->with('user', $this->user)
        ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(UserRequest $request)
    {            
        
        if (request('password') !== null) {

            $user = $this->user->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'active' => 1,
            ]);
            
        }else{

            $user = $this->user->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'email' => request('email'),
                'active' => 1,
            ]);
        }

        $view = View::make('admin.pages.users.index')
        ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('user', $this->user)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $user->id,
        ]);
    }

    public function edit(User $user)
    {
        $view = View::make('admin.pages.users.index')
        ->with('user', $user)
        ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(User $user){
        $view = View::make('admin.pages.users.index')
        ->with('user', $user)
        ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $view['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function destroy(User $user)
    {
        $user->active = 0;
        $user->save();

        $view = View::make('admin.pages.users.index')
            ->with('user', $this->user)
            ->with('users', $this->user->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
