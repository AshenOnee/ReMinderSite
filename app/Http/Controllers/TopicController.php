<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $topics = Topic::all()->where('user_id', $user->id);
        return View::make('topic.index')->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return View::make('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $topic = new Topic;
        $topic->name = Input::get('name');
        $topic->user_id = $user->id;
        $topic->save();

        Session::flash('message', 'Категория успешно созданна!');
        return Redirect::to('topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);

        return View::make('topic.edit')
            ->with('topic', $topic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $topic = Topic::find($id);
        $topic->name = Input::get('name');
        $topic->save();

        Session::flash('message', 'Категория успешно обновленна!');
        return Redirect::to('topics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $user = Auth::user();
        $default = Topic::all()->where('user_id', $user->id)->where('name', 'Общее')->first();
        $tasks = Task::all()->where('user_id', $user->id)->where('topic_id', $topic->id);
        for($i = 0; $i < count($tasks); $i++){
            $tasks[$i]->topic_id = $default->id;
            $tasks[$i]->save();
        }
        $topic->delete();
        return Redirect::to('topics');
    }

    public function createDefault($id)
    {
        $topic = new Topic;
        $topic->name = 'Общее';
        $topic->user_id = $id;
        $topic->save();

        $topic = new Topic;
        $topic->name = 'Работа';
        $topic->user_id = $id;
        $topic->save();

        $topic = new Topic;
        $topic->name = 'Учёба';
        $topic->user_id = $id;
        $topic->save();

        $topic = new Topic;
        $topic->name = 'Отдых';
        $topic->user_id = $id;
        $topic->save();

        $topic = new Topic;
        $topic->name = 'Семья';
        $topic->user_id = $id;
        $topic->save();
        return;
    }
}
