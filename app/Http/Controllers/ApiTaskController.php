<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Task;
use Illuminate\Http\Request;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class ApiTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();
        $tasks = Task::with(['topic'])->where('user_id', $user->id);
        return json_encode($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if($task->periodical == 0)
            $task->date =request()->headers->get('notifyDate');
        $task->notify_date = request()->headers->get('notifyDate');
        $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        if($task->periodical == 0)
            $task->delete();
        else {

            $taskDateInt = (float)($task->date);
            $nowDate = new DateTime();
            $nowDateInt = (float)($nowDate->getTimestamp()*1000);
            $diff = $nowDateInt - $taskDateInt;

            $step = (float)($task->quant * $task->minuts * 60 * 1000);


            //$date = new DateTime($task->date);
            //$since = $date->diff(new DateTime());

            //$minutes = $since->days * 24 * 60;
            //$minutes += $since->h * 60;
            //$minutes += $since->i;


            //$interval = $task->quant * $task->minuts;

            try{
//               $need = $minutes/$interval;
                $need = $diff/$step;

            }catch (Exception $ex){
                return json_encode($ex);
            }
                $need = (int)$need;
//            if($minutes%$interval > 0)
//                $need++;

            if($diff%$step > 0)
                $need++;

            //$need = $need * $interval;
            $need = $need * $step;
            $taskDateInt += $need;
            //$date->add(new DateInterval('PT'.$need.'M'));

            //$task->date = $date;
            //$task->notify_date = $date;
            $task->date = $taskDateInt;
            $task->notify_date = $taskDateInt;
            $task->save();
        }
    }
}
