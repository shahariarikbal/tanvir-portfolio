<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Client::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.client.index', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.client.index', compact('data', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:1024'
        ]);

        try{
            if($request->file('image')){
                $fileName = uniqid('client_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(('clients'), $fileName);
            }
            $client = new Client();
            $client->name = $request->name;
            $client->designation = $request->designation;
            $client->description = $request->description;
            $client->image = $fileName;
            $client->save();
            return redirect('client/list')->with('success', 'Testimonial has been successfully created.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $page = 'edit';
        $data = '';
        return view('backend.client.index', compact('data', 'page', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'image' => 'required|image|max:1024',
        ]);

        try{

            if ($request->hasFile('image')) {
                if(file_exists(public_path('clients/').$client->image)){
                    unlink(public_path('clients/').$client->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(('clients'), $imageName);
                $client->image = $imageName;
            }
            $client->description = $request->description;
            $client->name = $request->name;
            $client->designation = $request->designation;
            $client->save();
            return redirect('/client/list')->with('success', 'Testimonial has been successfully updated.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('client/list')->with('success', 'Testimonial has been successfully deleted.');
    }
}
