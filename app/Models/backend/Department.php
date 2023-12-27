<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\backend\Project;
use App\Models\backend\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department_user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function department_project(){
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function department_client(){
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
