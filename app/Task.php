<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'date', 'notify_date', 'periodical', 'quant', 'minuts'];
    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function topic() {
        return $this->hasOne('App\Topic', 'id','topic_id');
    }
}
