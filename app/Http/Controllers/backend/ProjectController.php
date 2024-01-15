<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Allocated_User;
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
                $sales_users = User::where('role', '!=', 'admin')->whereIn('department', $departments)->get();
                // dd($sales_users);
                $count = 1;
                return view('backend.projects.create', compact('projects', 'count', 'users', 'clients', 'sales_users'));
            } else {
                # code...
                $project_ids = Allocated_User::where('user_id', auth()->id())->pluck('project_id');
                $projects = Project::whereIn('id', $project_ids)->latest()->get();
                // dd($projects);
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
            'allocated_user' => 'required|array',
            'cost' => 'required',
            'start_date' => 'required|date',
            // 'end_date' => 'required|date',
            // 'phase' => 'required',
            'status' => 'required',
            // 'file' => 'required',
            'comment' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        $data = $request->all();
        unset($data['_token']);
        unset($data['allocated_user']);
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
        $project = Project::create($data);
        if (count($request->allocated_user) > 0) {
            # code...
            foreach ($request->allocated_user as $key => $value) {
                # code...
                $data1 = [
                    'project_id' => $project->id,
                    'user_id' => $value
                ];

                Allocated_User::create($data1);
                $user = $project->specefic_user($value);
                send_mail($project, 'message', $user->email, 'backend.email.project_allocated');

                // dd($user);
            }
        }

        return redirect()->back()->with('success', 'Successfully Project created.');
        try {
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
            // dd(in_array(2, $project->project_users_ids()));
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
            'allocated_user' => 'required|array',
            'cost' => 'required',
            'start_date' => 'required|date',
            // 'end_date' => 'required|date',
            // 'phase' => 'required',
            'status' => 'required',
            'comment' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            $data['updated_by'] = auth()->id();
            unset($data['allocated_user']);
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
            // dd($data, $request->allocated_user);

            if (count($request->allocated_user) > 0) {
                // dd(Allocated_User::where('project_id', $project->id)->whereIn('user_id', $project->project_users_ids())->pluck('id')->toArray());
                $data12 = Allocated_User::destroy(Allocated_User::where('project_id', $project->id)->whereIn('user_id', $project->project_users_ids())->pluck('id')->toArray());

                // dd($data12);
                foreach ($request->allocated_user as $key => $value) {
                    # code...
                    $data1 = [
                        'project_id' => $project->id,
                        'user_id' => $value
                    ];

                    Allocated_User::create($data1);
                    $user = $project->specefic_user($value);
                    send_mail($project, 'message', $user->email, 'backend.email.project_allocated');

                    // dd($user);
                }
            }

            $project->update($data);
            // $project->save();
            return redirect()->back()->with('success', 'Successfully Project Updated.');
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


    public function client_details(Request $request)
    {
        // dd($request->all());

        try {
            $client = Client::find($request->client_id);
            // dd($client);
            return response()->json([
                'status' => 'success',
                'data' => $client,
                'message' => 'Data fetched successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => [],
                'message' => $e->getMessage()
            ]);
        }
    }
}
