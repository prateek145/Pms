<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AvailablityController extends Controller
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
            $busy_time = null;
            $free_time = null;
            // $data = [];
            return view('backend.availablity.index', compact( 'users', 'busy_time', 'free_time'));
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
            // dd($request->all());
            $users = User::where('role', '!=', 'admin')->get();
            $queryTodo = Task::query();
            $queryTodo->where('allocated_user', $request->user_id);
            $queryTodo->whereNot('status', 'cancel');
            $queryTodo->where('start_date', $request->date)->orwhereJsonContains('dates', $request->date);


            $data = $queryTodo->get();
            $data1 = $queryTodo->select('start_time', 'end_time')->get();
            // dd($data1);
            $diffrence = 0;
            foreach ($data1 as $key => $value) {
                # code...
                // dd(round(abs($value->end_time - $value->start_time) / 60,2). " minute");
                $time1 = strtotime($value->start_time);
                $time2 = strtotime($value->end_time);
                $diffrence += abs($time1 - $time2) / 60;
                
            }
            // dd($diffrence);
            $busy_time1 = 480 - $diffrence;
            $free_time1 = 480 - $diffrence;

            $free_time =bcdiv((480 - $diffrence) , 60, 1);
            $busy_time =bcdiv((480 - $free_time1) , 60, 1);
            // dd($busy_time, $free_time, $diffrence);

            $selected_user = $request->user_id;
            $selected_date = $request->date;
            
            return view('backend.availablity.index', compact( 'users', 'data', 'busy_time', 'free_time', 'data1', 'selected_user', 'selected_date' ));
            
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
