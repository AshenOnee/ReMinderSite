<?php

namespace App\Http\Controllers;

use App\Task;
use App\Topic;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
//        $tasks = Task::all()->where('user_id', $user->id);
        $tasks = Task::with(['topic'])->where('user_id', $user->id)->orderBy('date')->get();
        return View::make('task.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $topics = Topic::all()->where('user_id', $user->id)->pluck('name', 'id')->all();

        return View::make('task.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|max:100',
            'description' => 'max:255',
            'date' => 'required|date',
            'datetime' => 'numeric'
        );

        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('tasks/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        $date = Input::get('datetime');
        $dtNow = new DateTime();
//        if($date < $dtNow->getTimestamp()*1000){
//            return Redirect::to('tasks/create')
//                ->withErrors(['Нельзя добавить задачу на время и дату менее текущего.'])
//                ->withInput(Input::all());
//        }
        $user = Auth::user();
        $task = new Task;
        $task->title = Input::get('title');
        $task->description = Input::get('description');
        $task->user_id = $user->id;
        $task->topic_id = Input::get('topic');
        $task->date = Input::get('datetime');
        $task->notify_date = Input::get('datetime');

        $periodical = Input::get('periodical');
        $task->periodical = ($periodical === 'on');

        if($periodical) {
            $task->quant = Input::get('quant');
            $task->minuts = Input::get('minuts');
        }
        $task->save();

        Session::flash('message', 'Задача успешно созданна!');
        return Redirect::to('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $task = Task::find($id);
        $topics = Topic::all()->where('user_id', $user->id)->pluck('name', 'id')->all();

        return View::make('task.edit', compact('topics'))->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::find($id);
        $task->title = Input::get('title');
        $task->description = Input::get('description');
        $task->topic_id = Input::get('topic');

        $task->date = Input::get('datetime');

        if($task->notify_date < $task->date){
            $task->notify_date = $task->date;
        }

        $periodical = Input::get('periodical');
        $task->periodical = ($periodical === 'on');

        if($periodical){
            $task->quant = Input::get('quant');
            $task->minuts = Input::get('minuts');
        }

        $task->save();

        Session::flash('message', 'Задача успешно обновленна!');
        return Redirect::to('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return Redirect::to('tasks');
    }
}
