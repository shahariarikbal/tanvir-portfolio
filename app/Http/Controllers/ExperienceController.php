<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Experience::orderBy('created_at', 'desc')->get();
        return view('backend.resume.experience', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.resume.experience', compact('data', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'designation' => 'required',
            'company_name' => 'required',
            'description' => 'required',
        ]);

        try {
            $experience = new Experience();
            $experience->designation = $request->designation;
            $experience->company_name = $request->company_name;
            $experience->description = $request->description;
            $experience->save();
            return redirect()->route('experiences.index')->with('success', 'Experience has been created.');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        $page = 'edit';
        $data = '';
        return view('backend.resume.experience', compact('data', 'page', 'experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $this->validate($request, [
            'designation' => 'required',
            'company_name' => 'required',
            'description' => 'required',
        ]);

        try {
            $experience->designation = $request->designation;
            $experience->company_name = $request->company_name;
            $experience->description = $request->description;
            $experience->save();
            return redirect()->route('experiences.index')->with('success', 'Experiences has been updated');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experiences has been successfully deleted.');
    }
}
