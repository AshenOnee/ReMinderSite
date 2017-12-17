<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = ['user_id', 'name'];
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function task(){
        return $this->belongsTo('App\Task', 'topic_id', 'id');
    }
}
