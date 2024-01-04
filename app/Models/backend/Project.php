<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project_allocated_user(){
        $data = $this->hasMany(Allocated_User::class,'project_id', 'id');
        $users =User::whereIn('id', $data->pluck('user_id'))->pluck('name');
        return $users;
    }

    public function specefic_user($id){
        $user = User::find($id);
        return $user;
    }

}
