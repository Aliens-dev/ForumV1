<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    public function index($id) {
        $forum = Forum::findOrFail($id);
        $threads = $forum->threads->sortByDesc('created_at');
        return view('forum',compact(['threads','forum']));
    }

    public function searchPost(Request $request){
        $searchTerm = $request->search;
        $search = Thread::where('title','LIKE',"%{$searchTerm}%")
                        ->orWhere('content','LIKE',"%{$searchTerm}%")
                        ->get();
        return view('search',['search'=>$search,'searchTerm'=>$searchTerm]);
    }

    public function add(){
       return view('forum.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:20|unique:forums',
            'description' => 'required|max:100|min:3'
        ]);
        $forum = new Forum();
        $forum->user_id = auth()->id();
        $forum->name = $request->name;
        $forum->description = $request->description;
        $forum->save();
        Session::flash('success','Successfully added!');
        return redirect(route('home.index'));
    }

    public function edit($id){
        $forum = Forum::findOrFail($id);
        return view('forum.edit',compact('forum'));
    }

    public function update($id,Request $request){
        $forum = Forum::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'description' => 'required|max:100|min:3'
        ]);
        $forum->name = $request->name;
        $forum->description = $request->description;
        $forum->save();
        Session::flash('success','Successfully updated!');
        return redirect(route('home.index'));
    }

    public function delete($id){
        $forum = Forum::findOrFail($id);
        $forum->delete();
        Session::flash('success','Successfully deleted!');
        return redirect(route('home.index'));
    }
}
