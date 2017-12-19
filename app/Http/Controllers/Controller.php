<?php

namespace App\Http\Controllers;

use App\Task;
use DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function query(){
        $user = Auth::user();;
        $task = Task::query()->where('user_id', $user->id)->orderByDesc('notify_date')->first();
        if($task != null){
            $dtNow = new DateTime();
            $dtTask = new DateTime($task->date);

            if($dtNow < $dtTask)
                return json_encode($task);
            else return null;
        }
        return null;
    }

    public function checkAuth(){
        return json_encode(Auth::check());
    }
}
