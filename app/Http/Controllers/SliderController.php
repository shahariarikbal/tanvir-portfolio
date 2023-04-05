<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Slider::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.slider.index', compact('data', 'page'));
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
        return view('backend.slider.index', compact('data', 'page'));
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
            'title' => 'required|max:191',
            'image' => 'required|image|max:1024'
        ]);

        try{
            if($request->file('image')){
                $fileName = uniqid('slider_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(('slider'), $fileName);
            }
            $blog = new Slider();
            $blog->title = $request->title;
            $blog->image = $fileName;
            $blog->save();
            return redirect('/slider/list')->with('success', 'Slider has been successfully created.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $page = 'edit';
        $data = '';
        return view('backend.slider.index', compact('data', 'page', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
        ]);

        try{

            if ($request->hasFile('image')) {
                if(file_exists(public_path('slider/').$slider->image)){
                    unlink(public_path('slider/').$slider->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(('slider'), $imageName);
                $slider->image = $imageName;
            }
            $slider->title = $request->title;
            $slider->save();
            return redirect('/slider/list')->with('success', 'Blog has been successfully updated.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect('/slider/list')->with('success', 'Blog has been successfully deleted.');
    }
}
