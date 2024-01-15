<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Client;


class ClientController extends Controller
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
            $clients = Client::latest()->get();
            // dd($clients);
            $count = 1;
            return view('backend.clients.create', compact('clients', 'count'));
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|numeric',
            // 'phone2' => 'required|min:10|numeric',
            'business_name' => 'required',
            'business_address' => 'required',
            // 'gst_no' => 'required',
            'lead_source' => 'required',
            'status' => 'required'
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            unset($data['_token']);
            $data['created_by'] = auth()->id();
            Client::create($data);
            return redirect()->back()->with('success','Successfully Clinet created.');
            
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
            $client = Client::find($id);
            return view('backend.clients.edit', compact('client'));
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
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|numeric',
            // 'phone2' => 'required|min:10|numeric',
            'business_name' => 'required',
            'business_address' => 'required',
            // 'gst_no' => 'required',
            'lead_source' => 'required',
            'status' => 'required'
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);

        try {
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            $user = Client::find($id);
            $data['updated_by'] = auth()->id();
            $user->update($data);
            return redirect()->back()->with('success','Successfully Client Updated.');
            
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
}
