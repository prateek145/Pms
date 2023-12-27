<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Project;
use App\Models\backend\Task;
use App\Models\backend\TaskFile;
use App\Models\backend\TimeLagged;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (auth()->user()->role == 'admin') {
                # code...
                $tasks = Task::latest()->get();
                $projects = Project::latest()->get();
                $users = User::where('role', '!=', 'admin')->get();
                $count = 1;
                return view('backend.tasks.create', compact('tasks', 'count', 'users', 'projects'));
            } else {
                # code...
                $tasks = Task::where('allocated_user', auth()->id())->latest()->get();
                $count = 1;
                return view('backend.tasks.create', compact('tasks', 'count'));
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'schedule' => 'required',
            // 'recurring_type' => 'required',
            // 'daterange' => 'required',
            'project' => 'required',
            'allocated_user' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'task_type' => 'required',
            'description' => 'required',
            'file' => 'required',
            'start_date' => 'required',
            'end_date' => 'required_if:schedule,==,recurring',
            'dates' => 'required_if:schedule,==,recurring',
            'start_time' => 'required',
            'end_time' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {

            if ($request->schedule == 'recurring') {
                # code...
                $taskTodo = Task::query();
                $taskTodo->orderBy('id', 'desc');
                $taskTodo->where('allocated_user', $request->allocated_user);
                // dd(count($taskTodo->get()));
                if (count($taskTodo->get()) >= 0) {
                    # code...
                    $taskTodo->whereIn('start_date', $request->dates)->where('schedule', 'one_time');
                    $found = false;
                    if ($request->start_time && $request->start_time) {
                        # code...
                        $taskTodo->whereTime('start_time', '<=', $request->start_time);

                        $taskTodo->whereTime('end_time', '>=', $request->start_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                        $taskTodo->whereTime('start_time', '<=', $request->end_time);
                        $taskTodo->whereTime('end_time', '>=', $request->end_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                    }
                }
                if (count($taskTodo->get()) <= 0) {
                    # code...
                    $taskTodo->whereJsonContains('dates', $request->dates);
                    $found = false;
                    if ($request->start_time && $request->start_time) {
                        # code...
                        $taskTodo->whereTime('start_time', '<=', $request->start_time);
                        $taskTodo->whereTime('end_time', '>=', $request->start_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                        $taskTodo->whereTime('start_time', '<=', $request->end_time);
                        $taskTodo->whereTime('end_time', '>=', $request->end_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                    }
                }
                // dd($taskTodo->get(), $request->dates, $request->all());


                // dd($found);
                if ($found === true) {
                    # code...
                    throw new \Exception("User Already Working on Task At Same Time and Date");
                } else {
                    # code...
                    $data = $request->all();
                    $data['dates'] = json_encode(array_unique($request->dates));
                    unset($data['_token']);
                    $data['created_by'] = auth()->id();
                    if ($request->file) {
                        $imagearr = [];
                        for ($i = 0; $i < count($request->file); $i++) {
                            $imagearr[$i] = rand() . $request->file[$i]->getClientOriginalName();
                            $destination_path = public_path('/uploads/tasks');
                            $request->file[$i]->move($destination_path, $imagearr[$i]);
                        }
                        $data['file'] = json_encode($imagearr);
                    }
                    Task::create($data);
                    return redirect()->back()->with('success', 'Successfully Task created.');
                }
            } else {
                $taskTodo = Task::query();
                $taskTodo->orderBy('id', 'desc');
                $taskTodo->where('allocated_user', $request->allocated_user);
                $taskTodo->where('start_date', $request->start_date);

                $found = false;
                if ($request->start_time && $request->start_time) {
                    $taskTodo->whereTime('start_time', '<=', $request->start_time);
                    $taskTodo->whereTime('end_time', '>=', $request->start_time);
                    if (count($taskTodo->get()) > 0) {
                        $found = true;
                    }
                    $taskTodo->whereTime('start_time', '<=', $request->end_time);
                    $taskTodo->whereTime('end_time', '>=', $request->end_time);
                    if (count($taskTodo->get()) > 0) {
                        $found = true;
                    }
                }

                if ($found === true) {
                    # code...
                    throw new \Exception("User Already Working on Task At Same Time and Date");
                } else {
                    # code...
                    $data = $request->all();
                    unset($data['_token']);
                    $data['created_by'] = auth()->id();
                    if ($request->file) {
                        $imagearr = [];
                        for ($i = 0; $i < count($request->file); $i++) {
                            $imagearr[$i] = rand() . $request->file[$i]->getClientOriginalName();
                            $destination_path = public_path('/uploads/tasks');
                            $request->file[$i]->move($destination_path, $imagearr[$i]);
                        }
                        $data['file'] = json_encode($imagearr);
                    }
                    Task::create($data);
                    return redirect()->back()->with('success', 'Successfully Task created.');
                }
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $task = Task::find($id);
            $projects = Project::latest()->get();
            $users = User::where('role', '!=', 'admin')->get();
            $count = 1;

            // dd($task);
            if (auth()->user()->role == 'admin') {
                # code...
                $taskfiles = $task->taskfiles()->latest()->get();
                $taskloggeds = [];
                $count1 = 1;
                $totalduration = 0;
            } else {
                # code...
                $taskfiles = $task->taskfiles()->where('created_by', auth()->user()->id)->latest()->get();
                $taskloggeds = TimeLagged::where(['created_by' => auth()->id(), 'task_id' => $task->id])->get();
                $durations = TimeLagged::where(['created_by' => auth()->id(), 'task_id' => $task->id])->pluck('duration');
                $secondes = 0;
                foreach ($durations as $key => $value) {
                    # code...
                    $secondes += $value;
                }
                $totalduration = second_hours($secondes);
                $count1 = 1;
            }
                // dd($secondes, $totalduration);


            // dd('prateek');
            return view('backend.tasks.edit', compact('projects', 'users', 'count1', 'task', 'count', 'taskfiles', 'taskloggeds', 'totalduration'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        if (auth()->user()->role == 'admin') {
            # code...
            $rules = [
                'name' => 'required',
                'schedule' => 'required',
                'project' => 'required',
                'allocated_user' => 'required',
                'status' => 'required',
                'start_date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'priority' => 'required',
                'task_type' => 'required',
                'description' => 'required',
                'end_date' => 'required_if:schedule,==,recurring',
                'dates' => 'required_if:schedule,==,recurring|array|min:1',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
        } else {
            # code...
            $rules = [
                'status' => 'required',
                'file' => 'required',
                'comment' => 'required',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
        }

        try {
            $data = $request->all();
            unset($data['_token']);
            $task = Task::find($id);
            if (auth()->user()->role == 'admin') {
                if ($request->schedule == 'recurring') {
                    # code...
                    $taskTodo = Task::query();
                    $taskTodo->orderBy('id', 'desc');
                    $taskTodo->where('allocated_user', $request->allocated_user);
                    // dd($taskTodo->get());
                    if (count($taskTodo->get()) >= 0) {
                        # code...
                        $taskTodo->whereIn('start_date', $request->dates)->where('schedule', 'one_time');
                        $found = false;
                        if ($request->start_time && $request->start_time) {
                            # code...
                            $taskTodo->whereTime('start_time', '<=', $request->start_time);

                            $taskTodo->whereTime('end_time', '>=', $request->start_time);
                            if (count($taskTodo->get()) > 0) {
                                $found = true;
                            }
                            $taskTodo->whereTime('start_time', '<=', $request->end_time);
                            $taskTodo->whereTime('end_time', '>=', $request->end_time);
                            if (count($taskTodo->get()) > 0) {
                                $found = true;
                            }
                        }
                    }
                    if (count($taskTodo->get()) <= 0) {
                        # code...
                        $taskTodo->whereJsonContains('dates', $request->dates);
                        $found = false;
                        if ($request->start_time && $request->start_time) {
                            # code...
                            $taskTodo->whereTime('start_time', '<=', $request->start_time);
                            $taskTodo->whereTime('end_time', '>=', $request->start_time);
                            if (count($taskTodo->get()) > 0) {
                                $found = true;
                            }
                            $taskTodo->whereTime('start_time', '<=', $request->end_time);
                            $taskTodo->whereTime('end_time', '>=', $request->end_time);
                            if (count($taskTodo->get()) > 0) {
                                $found = true;
                            }
                        }
                    }
                    // dd($taskTodo->get(), $request->dates, $request->all());


                    // dd($found);
                    if ($found === true) {
                        # code...
                        throw new \Exception("User Already Working on Task At Same Time and Date");
                    } else {
                        # code...
                        $data = $request->all();
                        $data['dates'] = json_encode(array_unique($request->dates));
                        unset($data['_token']);
                        $data['created_by'] = auth()->id();
                        if ($request->file()) {
                            # code...
                            $imagearr = json_decode($task->file);
                            $imagearr1 = [];
                            for ($i = 0; $i < count($request->file); $i++) {
                                # code...
                                $imagearr1[$i] = rand() . $request->file[$i]->getClientOriginalName();
                                $destination_path = public_path('/uploads/tasks');
                                $request->file[$i]->move($destination_path, $imagearr1[$i]);
                            }
                            $task->file = array_merge($imagearr, $imagearr1);
                        }
                        $task->update($data);
                        return redirect()->back()->with('success', 'Successfully Task Updated.');
                    }
                } else {
                    $taskTodo = Task::query();
                    $taskTodo->orderBy('id', 'desc');
                    $taskTodo->where('allocated_user', $request->allocated_user);
                    $taskTodo->where('start_date', $request->start_date);

                    $found = false;
                    if ($request->start_time && $request->start_time) {
                        $taskTodo->whereTime('start_time', '<=', $request->start_time);
                        $taskTodo->whereTime('end_time', '>=', $request->start_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                        $taskTodo->whereTime('start_time', '<=', $request->end_time);
                        $taskTodo->whereTime('end_time', '>=', $request->end_time);
                        if (count($taskTodo->get()) > 0) {
                            $found = true;
                        }
                    }

                    if ($found === true) {
                        # code...
                        throw new \Exception("User Already Working on Task At Same Time and Date");
                    } else {
                        # code...
                        $data = $request->all();
                        unset($data['_token']);
                        $data['created_by'] = auth()->id();
                        if ($request->file()) {
                            # code...
                            $imagearr = json_decode($task->file);
                            $imagearr1 = [];
                            for ($i = 0; $i < count($request->file); $i++) {
                                # code...
                                $imagearr1[$i] = rand() . $request->file[$i]->getClientOriginalName();
                                $destination_path = public_path('/uploads/tasks');
                                $request->file[$i]->move($destination_path, $imagearr1[$i]);
                            }
                            $task->file = array_merge($imagearr, $imagearr1);
                        }
                        $task->update($data);
                        return redirect()->back()->with('success', 'Successfully Task Updated.');
                    }
                }
            } else {
                //create task file
                $data['created_by'] = auth()->id();
                $data['task_id'] = $id;
                $data['previous_status'] = $task->status;
                $data['current_status'] = $request->status;
                if ($request->file) {

                    $imagearr1 = [];
                    for ($i = 0; $i < count($request->file); $i++) {
                        # code...
                        $imagearr1[$i] = rand() . $request->file[$i]->getClientOriginalName();
                        $destination_path = public_path('/uploads/taskfiles');
                        $request->file[$i]->move($destination_path, $imagearr1[$i]);
                    }
                    $data['file'] = json_encode($imagearr1);
                }
                // dd($data);
                unset($data['status']);
                unset($data['tasklagged_id']);
                TaskFile::create($data);
                return redirect()->back()->with('success', 'Successfully Task file Created.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function images_delete($id, $key)
    {

        try {
            $project = Task::find($id);
            $images = json_decode($project->file);
            unset($images[$key]);
            $project->file = json_encode($images);
            $project->save();
            return redirect()->back()->with('success', 'File Deleted');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function check_availablity(Request $request)
    {
        dd($request->all());
    }
}
