<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Client;
use App\Models\backend\Department;
use App\Models\backend\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
                $projects = Project::latest()->get();
                // dd($projects);
                $users = User::where('role', '!=', 'admin')->get();
                $clients = Client::all();

                $departments = Department::where('sales_person', 1)->pluck('id');
                // dd($departments);
                $sales_users = User::where('role', '!=', 'admin')->whereIn('id', $departments)->get();
                // dd($sales_users);
                $count = 1;
                return view('backend.projects.create', compact('projects', 'count', 'users', 'clients', 'sales_users'));
            } else {
                # code...
                $projects = Project::where('allocated_user', auth()->id())->latest()->get();
                $count = 1;
                return view('backend.projects.create', compact('projects', 'count'));
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
            'client_name' => 'required',
            'client_phone' => 'required|min:10|numeric',
            'client_email' => 'required|min:10|email',
            'sales_person' => 'required|integer',
            'allocated_user' => 'required|integer',
            'cost' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'phase' => 'required',
            'status' => 'required',
            // 'file' => 'required',
            'comment' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            unset($data['_token']);
            $data['created_by'] = auth()->id();

            if ($request->file) {
                # code...
                $imagearr = [];
                for ($i = 0; $i < count($request->file); $i++) {
                    # code...
                    $imagearr[$i] = rand() . $request->file[$i]->getClientOriginalName();
                    $destination_path = public_path('/uploads/projects');
                    $request->file[$i]->move($destination_path, $imagearr[$i]);
                }
                $data['file'] = json_encode($imagearr);
            }
            // dd($data);
            Project::create($data);
            return redirect()->back()->with('success', 'Successfully Clinet created.');
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
            $project = Project::find($id);
            $users = User::where('role', '!=', 'admin')->get();
            return view('backend.projects.edit', compact('project', 'users'));
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
        //
        $rules = [
            'name' => 'required',
            'client_name' => 'required',
            'client_phone' => 'required|min:10|numeric',
            'client_email' => 'required|min:10|email',
            'sales_person' => 'required|integer',
            'allocated_user' => 'required|integer',
            'cost' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'phase' => 'required',
            'status' => 'required',
            'comment' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            dd($data);
            unset($data['_token']);
            $data['updated_by'] = auth()->id();
            $project = Project::find($id);

            if ($request->file) {
                # code...
                $imagearr = json_decode($project->file);
                $imagearr1 = [];
                for ($i = 0; $i < count($request->file); $i++) {
                    # code...
                    $imagearr1[$i] = rand() . $request->file[$i]->getClientOriginalName();
                    $destination_path = public_path('/uploads/projects');
                    $request->file[$i]->move($destination_path, $imagearr1[$i]);
                }
                $data['file'] = array_merge($imagearr, $imagearr1);
            }
            // dd($data);

            $project->update($data);
            // $project->save();
            return redirect()->back()->with('success', 'Successfully Clinet Updated.');
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
    public function destroy(Request $request, $id)
    {
        //
        // dd($id,$request->all());
        // $project = Project::find($id);
        // $images = json_decode($project->file);
        // unset($images[$request->image_position]);
        // $project->file = json_encode($images); 
        // $project->save();
        // return redirect()->back()->with('success', 'File Deleted');
    }

    public function images_delete($id, $key)
    {

        try {
            $project = Project::find($id);
            $images = json_decode($project->file);
            unset($images[$key]);
            // dd($images);
            $project->file = json_encode($images);
            $project->save();
            return redirect()->back()->with('success', 'File Deleted');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
