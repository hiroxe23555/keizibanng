<?php

namespace App\Repositories;

use App\Thread;
use Carbon\Carbon;

class ThreadRepository
{
    /**
     * @var Thread
     */
    protected $thread;

    /**
     * ThreadRepository constructor.
     *
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Create new Thread.
     *
     * @return Thread $thread
     */
    public function create(array $data)
    {
        return $this->thread->create($data);
    }
    public function getPaginatedThreads(int $per_page)
    {
        return $this->thread->orderBy('latest_comment_time', 'desc')->paginate($per_page);
       // return $this->thread->paginate($per_page);
    }
        /**
     * Find a thread by id
     *
     * @param int $id
     * @return Thread $thread
     */
    public function findById(int $id)
    {
        return $this->thread->find($id);
    }
    public function updateTime(int $id)
    {
        $thread = $this->findById($id);
        $thread->latest_comment_time = Carbon::now();
        return $thread->save();
    }
        /**
     * Delete thread from id
     *
     * @param integer $id
     * @return void
     */
    public function deleteThread(int $id)
    {
        $thread = $this->findById($id);
        return $thread->delete();
    }
    

   

}