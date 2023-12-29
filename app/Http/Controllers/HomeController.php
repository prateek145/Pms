<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\backend\Client;
use App\Models\backend\Project;
use App\Models\backend\Task;
use Carbon\Carbon;


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

        $current_date = Carbon::now()->toArray();
        // dd($current_date);
        $current_day = $current_date['day'];
        $current_month = $current_date['month'];
        $current_year = $current_date['year'];
        $year = $current_year;
        $currentmonth = date('F');
        $daysinmonth = Carbon::now()->daysInMonth;
        $date = Carbon::now()->format('Y-m-d');
        // dd($date);
        return view('backend.home', compact('users','date', 'clients', 'projects', 'tasks', 'currentmonth', 'current_year', 'current_month', 'current_date', 'daysinmonth', 'current_day'));
    }

    public function previousmonth_dashboard($date)
    {
        try {
            //code...
            // dd($date);
            $yearmonth = date('m', strtotime($date));
            if ($yearmonth == '01') {
                //# code...
                $year = date('Y', strtotime($date . ' -1 year'));
                // dd($year);
            } else {
                //# code...
                $year = date('Y', strtotime($date));
            }
            $month = date('m', strtotime($date . ' -1 months'));
            $current_date = Carbon::createFromDate($year, $month)->toArray();
            $current_day = $current_date['day'];
            $current_month = $current_date['month'];
            $current_year = $current_date['year'];
            $currentmonth = date('F', strtotime($date . ' -1 months'));

            $showpinkbox = false;
            $daysinmonth = Carbon::createFromDate($year, $month)->daysInMonth;
        $date = Carbon::now()->format('Y-m-d');

            return view('backend.home', compact( 'year','date','currentmonth','current_year', 'current_month','current_date', 'daysinmonth', 'current_day'));
        } catch (\Exception $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    public function nextmonth_dashboard($date)
    {
        try {
            //code...
            // dd($date);
            $yearmonth = date('m', strtotime($date));
            if ($yearmonth == '12') {
                //# code...
                $year = date('Y', strtotime($date . ' +1 year'));
                // dd($year);
            } else {
                //# code...
                $year = date('Y', strtotime($date));
            }
            $month = date('m', strtotime($date . ' +1 months'));
            // dd($month, $year);
            $current_date = Carbon::createFromDate($year, $month)->toArray();
            // dd($current_date, $current_date['month'], $current_date['year'], date('F', strtotime($date . ' -1 months')));
            $current_day = $current_date['day'];
            $current_month = $current_date['month'];
            $current_year = $current_date['year'];
            $showpinkbox = false;
            $currentmonth = date('F', strtotime($date . ' +1 months'));

            $date = Carbon::now()->format('Y-m-d');
            $daysinmonth = Carbon::createFromDate($year, $month)->daysInMonth;
            return view('backend.home', compact( 'year','date','currentmonth','current_year', 'current_month','current_date', 'daysinmonth', 'current_day'));
        } catch (\Exception $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
