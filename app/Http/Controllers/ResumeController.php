<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Resume::orderBy('created_at', 'desc')->get();
        return view('backend.resume.index', compact('data', 'page'));
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
        return view('backend.resume.index', compact('data', 'page'));
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
            'title' => 'required',
            'uni_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'short_description' => 'required'
        ]);

        try {
            $resume = new Resume();
            $resume->title = $request->title;
            $resume->uni_name = $request->uni_name;
            $resume->start_date = $request->start_date;
            $resume->end_date = $request->end_date;
            $resume->short_description = $request->short_description;
            $resume->save();
            return redirect()->route('resumes.index')->with('success', 'Resume has been created.');
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
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        $page = 'edit';
        $data = '';
        return view('backend.resume.index', compact('data', 'page', 'resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        $this->validate($request, [
            'title' => 'required',
            'uni_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'short_description' => 'required'
        ]);

        try {
            $resume->title = $request->title;
            $resume->uni_name = $request->uni_name;
            $resume->start_date = $request->start_date;
            $resume->end_date = $request->end_date;
            $resume->short_description = $request->short_description;
            $resume->save();
            return redirect()->route('resumes.index')->with('success', 'Resume has been updated');
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
    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index')->with('success', 'Resume has been successfully deleted.');
    }
}
