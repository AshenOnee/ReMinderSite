<?php

namespace App\Http\Controllers;

use App\Task;
use DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function query(){
        $user = request()->user();
        //$task = Task::query()->where('user_id', $user->id)->orderBy('notify_date')->first();
        $task = Task::with(['topic'])->where('user_id', $user->id)->orderBy('notify_date')->first();
        if($task != null){
            $dtNow = new DateTime();

            if((($dtNow->getTimestamp())*1000) > (float)($task->notify_date))
                return json_encode($task);
            else return null;
        }
        return null;
    }

    public function checkAuth(){
        return response()->json(request()->user());
    }
}
