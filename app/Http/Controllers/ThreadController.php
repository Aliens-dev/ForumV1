<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index($id) {
        $thread = Thread::findOrFail($id);
        return view('thread',compact('thread'));
    }

    public function indexpost($id, Request $request){
        Thread::findOrFail($id);
        $reply = new Reply();
        $reply->content = $request->cont;
        $reply->thread_id = $id;
        $reply->user_id = auth()->id();
        $reply->save();
        return response()->json([
            'success'=>true,
            'message'=> 'Successfully added',
        ]);
    }

    public function add($id , Request $request) {
        $forum = Forum::findOrFail($id);
        return view('thread.add',compact('forum'));
    }
    public function store($id,Request $request) {
        $thread = new Thread();
        $thread->forum_id = $id;
        $thread->user_id = auth()->id();
        $thread->content = $request->cont;
        $thread->title = $request->title;
        $thread->save();

        return response()->json([
            'message' => 'Successfully added!',
            'success' => true
        ]);
    }
    public function edit($id){
        $thread= Thread::findOrFail($id);
        return view('thread.edit',compact('thread'));
    }
    public function editPost($id, Request $request){
        $thread= Thread::findOrFail($id);
        if($request->ajax()){
            return response()->json([
                'cont' => $thread->content,
                'title' => $thread->title,
                'success' => true,
            ]);
        }
    }

    public function update($id, Request $request){
        if($request->ajax()){
            $thread= Thread::findOrFail($id);
            $thread->content = $request->cont;
            $thread->title = $request->title;
            $thread->save();
            return response()->json([
                'message' => 'Successfully added!',
                'success' => true
            ]);
        }
        return response()->json([
            'message' => 'Failed! added!',
            'success' => false,
        ]);
    }

    public function editReply ($id, $reply) {
        $thread = Thread::findORFail($id);
        if($thread->replies->where('id',$reply)->count() > 0) {
            return view('reply.edit');
        }else {
            return back();
        }
    }
    public function editReplyPost ($id,$reply, Request $request) {
        $reply = Reply::findOrFail($reply);
        if($request->ajax()){
            return response()->json([
                'cont' => $reply->content,
                'success' => true,
            ]);
        }
    }
    public function updateReply($id,$reply,Request $request){
        if($request->ajax()){
            $reply = Reply::findOrFail($reply);
            $reply->content = $request->cont;
            $reply->thread_id = $id;
            $reply->save();
            return response()->json([
                'message' => 'Successfully Edited!',
                'success' => true
            ]);
        }
        return response()->json([
            'message' => 'Failed! Edit!',
            'success' => false,
        ]);
    }

    public function delete($id){
        $thread = Thread::findOrFail($id);
        $thread->delete();
        return back();
    }
}
