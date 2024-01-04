<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Client;
use App\Models\backend\Department;
use App\Models\backend\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
            $departments = Department::latest()->get();
            $projects = Project::latest()->get();
            $users = User::where('role','!=', 'admin')->latest()->get();
            $clients = Client::latest()->get();
            $count = 1;
            return view('backend.departments.create', compact('departments', 'projects', 'count', 'clients', 'users'));
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
        $rules = [
            'name' => 'required|unique:departments',
            // 'sales_person' => 'required',
            'status' => 'required',

        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            $data['created_by'] = auth()->id();
            // dd($data);
            unset($data['_token']);
            Department::create($data);
            return redirect()->back()->with('success','Successfully Department created.')->withInput();
            
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
        try {
            $department = Department::find($id);
            $projects = Project::latest()->get();
            $users = User::where('role','!=', 'admin')->latest()->get();
            $clients = Client::latest()->get();
            return view('backend.departments.edit', compact('department', 'projects', 'users', 'clients'));
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
        $rules = [
            'name' => 'required|unique:departments,name,' . $id .  "'",
            // 'sales_person' => 'required',
            'status' => 'required',

        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            if (!isset($request->sales_person)) {
                # code...
                $data['sales_person'] = 0;
            }
            $data['updated_by'] = auth()->id();
            $department = Department::find($id);
            $department->update($data);
            return redirect()->back()->with('success','Successfully Department Updated.');
            
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

    public function client_details(Request $request){
        try {
            $data = $request->all();
            $client = Client::find($request->client_id);
            return response()->json([
                'status' => 'success',
                'message' => 'Retrive Data Successfully',
                'data' => $client
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 401);
        }
    }
}
