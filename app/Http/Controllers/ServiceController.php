<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.service.index', compact('data', 'page'));
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
        return view('backend.service.index', compact('data', 'page'));
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
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'required|image|max:1024'
        ]);

        try{
            if($request->file('image')){
                $fileName = uniqid('service_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(('service'), $fileName);
            }
            $service = new Service();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->image = $fileName;
            $service->save();
            return redirect()->route('services.index')->with('success', 'Service has been successfully created.');
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
    public function edit($id)
    {
        $page = 'edit';
        $data = Service::find($id);
        return view('backend.service.index', compact('data', 'page'));
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
        $this->validate($request, [
            'title' => 'required|max:191',
            'description' => 'required',
        ]);

        try{
            $service = Service::find($id);
            if ($request->hasFile('image')) {
                if(file_exists(public_path('service/').$service->image)){
                    unlink(public_path('service/').$service->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(('service'), $imageName);
                $service->image = $imageName;
            }
            $service->title = $request->title;
            $service->description = $request->description;
            $service->save();
            return redirect()->route('services.index')->with('success', 'Service has been successfully updated.');
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
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('success', 'Service has been successfully deleted.');
    }
}
