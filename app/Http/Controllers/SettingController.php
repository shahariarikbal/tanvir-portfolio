<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setting.index', [
            'setting' => Setting::first(),
        ]);
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
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        if ($request->id){
            $setting = Setting::find($request->id);
            if (isset($request->image)){
                if ($setting->image){
                    file_exists(('slider/').$setting->image);
                }else {
                    unlink(public_path('/slider/').$setting->image);
                }
                $updateImage = time().'.'. $request->image->extension();

                $request->image->move(('slider'), $updateImage);
                $setting->image = $updateImage;
            }
            if (isset($request->certificate)){
                if ($setting->certificate && file_exists(('slider/').$setting->certificate)){
                    unlink(public_path('/slider/').$setting->certificate);
                }
                $updateImage = time().'.'. $request->certificate->extension();

                $request->certificate->move(('slider'), $updateImage);
                $setting->certificate = $updateImage;
            }
            $setting->title = $request->title;
            $setting->name = $request->name;
            $setting->designation = $request->designation;
            $setting->active_client = $request->active_client;
            $setting->project_complete = $request->project_complete;
            $setting->rating = $request->rating;
            $setting->experience = $request->experience;
            if ($request->fb){
                $setting->fb = $request->fb;
            }
            if ($request->tw){
                $setting->tw = $request->tw;
            }
            if ($request->in){
                $setting->in = $request->in;
            }
            if ($request->be){
                $setting->be = $request->be;
            }
            if ($request->youtube){
                $setting->youtube = $request->youtube;
            }
            $setting->save();
            return redirect()->back()->with('success', 'Setting has been updated updated.');
        }else{
            //Slider
            $file = $request->file('image');
            $slider = time().'.' . $file->getClientOriginalExtension();
            $file->move('slider/', $slider);

            //Certificate
            $file = $request->file('certificate');
            $certificate = time().'.' . $file->getClientOriginalExtension();
            $file->move('slider/', $certificate);

            $setting = new Setting();
            $setting->title = $request->title;
            $setting->name = $request->name;
            $setting->designation = $request->designation;
            $setting->active_client = $request->active_client;
            $setting->project_complete = $request->project_complete;
            $setting->rating = $request->rating;
            $setting->experience = $request->experience;
            if ($request->fb){
                $setting->fb = $request->fb;
            }
            if ($request->tw){
                $setting->tw = $request->tw;
            }
            if ($request->in){
                $setting->in = $request->in;
            }
            if ($request->be){
                $setting->be = $request->be;
            }
            if ($request->youtube){
                $setting->youtube = $request->youtube;
            }
            $setting->image = $slider;
            $setting->certificate = $certificate;
            $setting->save();
            return redirect()->back()->with('success', 'Setting has been created.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
