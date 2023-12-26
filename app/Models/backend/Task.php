<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\backend\Project;
use App\Models\backend\TimeLagged;
use App\Models\backend\TaskFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task_user(){
        // dd('pratek');
        return $this->hasOne(User::class, 'id', 'allocated_user');
    }

    public function task_project(){
        return $this->hasOne(Project::class, 'id', 'project');
    }

    public function taskfiles(){
        return $this->hasMany(TaskFile::class, 'task_id', 'id');
    }

    public function tasklagged(){
        return $this->hasMany(TimeLagged::class, 'task_id', 'id');
    }

}
