<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\backend\Client;
use App\Models\backend\Project;
use App\Models\backend\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $clients = Client::all();
        $projects = Project::all();
        $tasks = Task::all();
        // dd(count($clinets));
        return view('backend.home', compact('users', 'clients', 'projects', 'tasks'));
    }
}
