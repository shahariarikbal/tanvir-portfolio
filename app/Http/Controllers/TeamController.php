<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Team::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.team.index', compact('data', 'page'));
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
        return view('backend.team.index', compact('data', 'page'));
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
            'name' => 'required',
            'designation' => 'required',
            'fb_link' => 'required',
            'in_link' => 'required',
            'google_ads' => 'required',
            'shopify' => 'required',
            'dropshipping' => 'required',
            'google_shopping' => 'required',
            'marketing_strategy' => 'required',
            'image' => 'required|image|max:1024'
        ]);

        try{
            if($request->file('image')){
                $fileName = uniqid('team_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(('team'), $fileName);
            }
            $team = new Team();
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->fb_link = $request->fb_link;
            $team->in_link = $request->in_link;
            $team->google_ads = $request->google_ads;
            $team->fb_ads = $request->fb_ads;
            $team->shopify = $request->shopify;
            $team->dropshipping = $request->dropshipping;
            $team->google_shopping = $request->google_shopping;
            $team->marketing_strategy = $request->marketing_strategy;
            $team->image = $fileName;
            $team->save();
            return redirect()->route('teams.index')->with('success', 'Team has been successfully created.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
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
    public function edit(Team $team)
    {
        $page = 'edit';
        $data = '';
        return view('backend.team.index', compact('data', 'page', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'fb_link' => 'required',
            'in_link' => 'required',
            'fb_ads' => 'required',
            'google_ads' => 'required',
            'shopify' => 'required',
            'dropshipping' => 'required',
            'google_shopping' => 'required',
            'marketing_strategy' => 'required',
            'image' => 'required|image|max:1024'
        ]);

        try{

            if ($request->hasFile('image')) {
                if(file_exists(public_path('team/').$team->image)){
                    unlink(public_path('team/').$team->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(('team'), $imageName);
                $team->image = $imageName;
            }
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->fb_link = $request->fb_link;
            $team->in_link = $request->in_link;
            $team->fb_ads = $request->fb_ads;
            $team->google_ads = $request->google_ads;
            $team->shopify = $request->shopify;
            $team->dropshipping = $request->dropshipping;
            $team->google_shopping = $request->google_shopping;
            $team->marketing_strategy = $request->marketing_strategy;
            $team->save();
            return redirect()->route('teams.index')->with('success', 'Team has been successfully updated.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
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
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team has been successfully deleted.');
    }
}
