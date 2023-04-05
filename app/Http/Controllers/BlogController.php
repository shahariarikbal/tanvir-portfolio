<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'index';
        $data = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.blog.index', compact('data', 'page'));
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
        return view('backend.blog.index', compact('data', 'page'));
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
                $fileName = uniqid('blog_', true) . time().'.'.$request->image->getClientOriginalExtension();
                $imageName = $request->image->move(('blog'), $fileName);
            }
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->image = $fileName;
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'Blog has been successfully created.');
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
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $page = 'edit';
        $data = '';
        return view('backend.blog.index', compact('data', 'page', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'description' => 'required',
        ]);

        try{

            if ($request->hasFile('image')) {
                if(file_exists(public_path('blog/').$blog->image)){
                    unlink(public_path('blog/').$blog->image);
                }

                $imageName = time().'.'. $request->image->extension();
                $imageUrl = $request->image->move(('blog'), $imageName);
                $blog->image = $imageName;
            }
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'Blog has been successfully updated.');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog has been successfully deleted.');
    }
}
