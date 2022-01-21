<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Message;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\ThreadService;
use App\Repositories\ThreadRepository;
use Exception;

class UsersController extends Controller
{   
    protected $thread_service;

    protected $thread_repository;


    public function __construct(
        ThreadService $thread_service,
        ThreadRepository $thread_repository
    ) {

        $this->middleware('auth');
        $this->thread_service = $thread_service; // プロパティに代入する
        $this->thread_repository = $thread_repository;
    }

    public function index()
    {
        $threads = $this->thread_service->getThreads(3);
        $threads->load('messages.user', 'messages.images');
        return view('create', compact('threads'));
    }
    public function create()
    {
        
    }
    
    
    public function store(UsersRequest $request)
    {
        try {
            $data = $request->only(
                ['name', 'body']
            );
            $this->thread_service->createNewThread($data, Auth::id()); // new せずとも $this-> の形で呼び出せる（インジェクションした為）。
        } catch (Exception $error) {
            return redirect()->route('users.store')->with('error', 'スレッドの新規作成に失敗しました。');
        }
        // redirect to index method
        return redirect()->route('users.store')->with('success', 'スレッドの新規作成が完了しました。');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = $this->thread_repository->findById($id);
        if(!empty($thread)){
        $thread->load('messages.user','messages.images');
        }
        return view('show', compact('thread'));
    }

   
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
