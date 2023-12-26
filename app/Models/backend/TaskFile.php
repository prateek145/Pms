<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function taskfile_user(){
        // dd('pratek');
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
