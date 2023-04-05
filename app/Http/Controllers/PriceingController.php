<?php

namespace App\Http\Controllers;

use App\Models\Priceing;
use Exception;
use Illuminate\Http\Request;

class PriceingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Priceing::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.priceing.index', compact('data', 'page'));
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
        return view('backend.priceing.index', compact('data', 'page'));
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
            'description' => 'required',
            'title' => 'required',
            'price' => 'required',
            'order_number' => 'required',
            'image' => 'required|image|max:1024'
        ]);

        try{
            if($request->file('image')){
                $fileName = uniqid('priceing_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(public_path('priceing'), $fileName);
            }
            $price = new Priceing();
            $price->title = $request->title;
            $price->description = $request->description;
            $price->price = $request->price;
            $price->order_number = $request->order_number;
            $price->image = $fileName;
            $price->save();
            return redirect()->route('priceings.index')->with('success', 'Price has been successfully created.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priceing  $priceing
     * @return \Illuminate\Http\Response
     */
    public function show(Priceing $priceing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priceing  $priceing
     * @return \Illuminate\Http\Response
     */
    public function edit(Priceing $priceing)
    {
        $page = 'edit';
        $data = '';
        return view('backend.priceing.index', compact('data', 'page', 'priceing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Priceing  $priceing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priceing $priceing)
    {
        $this->validate($request, [
            'description' => 'required',
            'title' => 'required',
            'price' => 'required',
            'order_number' => 'required',
        ]);

        try{

            if ($request->hasFile('image')) {
                if(file_exists(public_path('priceing/').$priceing->image)){
                    unlink(public_path('priceing/').$priceing->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(public_path('priceing'), $imageName);
                $priceing->image = $imageName;
            }
            $priceing->title = $request->title;
            $priceing->description = $request->description;
            $priceing->price = $request->price;
            $priceing->order_number = $request->order_number;
            $priceing->save();
            return redirect()->route('priceings.index')->with('success', 'Priceing has been successfully updated.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priceing  $priceing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priceing $priceing)
    {
        $priceing->delete();
        return redirect()->route('priceings.index')->with('success', 'Priceing has been successfully deleted.');
    }
}
