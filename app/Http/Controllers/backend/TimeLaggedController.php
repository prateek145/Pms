<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\TimeLagged;
use Illuminate\Http\Request;

class TimeLaggedController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            $data['created_by'] = auth()->id();
            $data['start_time'] = date('Y-m-d H:i:s');
            $tasklagged = TimeLagged::create($data);
            // $task = TimeLagged::find($tasklagged->task_id);
            // $data['task_name'] = $task->name;
            // dd($task);
            // send_mail($data, 'message', $task->task_user->email, 'backend.email.timer_start', $task->name);
            // send_mail($data, 'message', env("Admin_Mail"), 'backend.email.timer_start', $task->name);

            return response()->json(['result'=>'success', 'tasklagged_id' => $tasklagged->id]);

        } catch (\Exception $e) {
            return redirect()->json(['result'=>$e->getMessage()]);

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
        //
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
        try {
            $timelagged = TimeLagged::where('created_by', auth()->id())->get()->last();
            $timelagged->end_time = date('Y-m-d H:i:s');
            $since_start = $timelagged->created_at->diff(date('Y-m-d H:i:s'));
            // dd($since_start);
            $timelagged->duration = ($since_start->h * 60 * 60) + ($since_start->i * 60) + $since_start->s;
            $timelagged->save();
            
            return response()->json(['result'=>'success']);

        } catch (\Exception $e) {
            return redirect()->json(['result'=>$e->getMessage()]);
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

    public function check_timelagged(Request $request){
        try {
            $timelagged = TimeLagged::where('created_by', auth()->id())->where('task_id', $request->task_id)->get()->last();
            if ($timelagged->end_time == "") {
                # code...
                $show = true;
            } else {
                # code...
                $show = false;
            }
            
            return response()->json(['result'=>'success', 'show' => $show]);

        } catch (\Exception $e) {
            return redirect()->json(['result'=>$e->getMessage()]);
        }
    }
}
