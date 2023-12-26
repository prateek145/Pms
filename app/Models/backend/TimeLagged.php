<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\backend\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLagged extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function timelagged_user(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function time_lagged_task(){
        return $this->hasOne(Task::class, 'id', 'task_id');
    }
}
