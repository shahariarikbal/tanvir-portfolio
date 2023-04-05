<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Portfolio::orderBy('created_at', 'desc')->get();
        return view('backend.portfolio.index', compact('data', 'page'));
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
        return view('backend.portfolio.index', compact('data', 'page'));
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
//            'title' => 'required',
//            'name' => 'required',
            'image' => 'required'
        ]);

        if ($request->file('image')){
            $banner = time().'.'. $request->image->extension();
            $request->image->move(('banner'), $banner);
        }
        $portfolio = new Portfolio();
        $portfolio->image = $banner;
        $portfolio->save();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $page = 'edit';
        $data = '';
        return view('backend.portfolio.index', compact('data', 'page', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
//        $this->validate($request, [
//            'title' => 'required',
//            'name' => 'required',
//        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                file_exists(public_path('/banner/').$portfolio->image);
            }else {
                unlink(public_path('/banner/').$portfolio->image);
            }

            $imageName = time().'.'. $request->image->extension();
            $imageUrl = $request->image->move(('banner'), $imageName);
            $portfolio->image = $imageName;
        }
//        $portfolio->title = $request->title;
//        $portfolio->name = $request->name;
        $portfolio->save();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio has been successfully updated.');
    }
}
