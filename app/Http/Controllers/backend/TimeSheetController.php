<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Task;
use App\Models\backend\TimeLagged;
use App\Models\User;
use Illuminate\Http\Request;

class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::where('role', '!=', 'admin')->get();
            $daterange_array = [];
            $assign_task_time = [];
            $time_taken = [];
            return view('backend.timesheet.index', compact('users', 'daterange_array', 'assign_task_time', 'time_taken'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
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
            $users = User::where('role', '!=', 'admin')->get();
            $timelagged = TimeLagged::where('created_by', $request->user_id)->whereBetween('created_at', [$request->start_date, $request->end_date])->get();
            $start_date = strtotime($request->start_date);
            $end_date = date_create(date('Y-m-d', strtotime("+30 days", $start_date)));
            $interval = \DateInterval::createFromDateString('1 day');
            $daterange = new \DatePeriod(date_create($request->start_date), $interval, $end_date);
            $daterange_array = [];
            foreach ($daterange as $date1) {
                array_push($daterange_array, $date1->format('Y-m-d'));
            }
            //task 
            // $tasks = Task::where('allocated_user', $request->user_id)->whereBetween('created_at', [$request->start_date, date('y-m-d', strtotime("+30 days", $start_date))])->get();
            $assign_task_time = [];
            $time_taken = [];

            foreach ($daterange_array as $key => $value) {
                $value = $value;
                $queryTodo = Task::query();
                $queryTodo->where('allocated_user', $request->user_id);
                $queryTodo->whereNot('status', 'cancel');
                // $queryTodo->where('schedule', 'recurring')->orWhere('schedule', 'one_time');
                $queryTodo->where('start_date', $value)->orWhere('dates', $value);
                // dd($queryTodo->get(), $value);

                if (count($queryTodo->get()) > 0) {
                    // dd($queryTodo->get());
                    $assign_task_time1 = 0;
                    $time_taken1 = 0;
                    foreach ($queryTodo->get() as $key1 => $value1) {
                        $assign_task_time1 += (strtotime($value1->end_time) - strtotime($value1->start_time));
                        // dd($value1->tasklagged()->get());
                        foreach ($value1->tasklagged()->get() as $key2 => $value2) {
                            $time_taken1 += $value2->duration;
                            // dd($value2->duration);
                        }
                    }
                    // dd($assign_task_time1, $time_taken1);
                    array_push($assign_task_time, gmdate("H.i", $assign_task_time1));
                    array_push($time_taken, gmdate("H.i", $time_taken1));
                } else {
                    // dd($task, 'kmr');
                    array_push($assign_task_time, 0);
                    array_push($time_taken, 0);
                }
            }
            $selected_user = $request->user_id;
            $selected_date = $request->start_date;
            // dd($value, $assign_task_time, $time_taken);

            return view('backend.timesheet.index', compact('users', 'timelagged', 'start_date', 'end_date', 'daterange_array', 'assign_task_time', 'time_taken', 'selected_user', 'selected_date'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
        //
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
}
