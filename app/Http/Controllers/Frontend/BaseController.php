<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Priceing;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $data = [
            'setting' => Setting::first(),
            'about' => About::first(),
            'resumes' => Resume::all(),
            'portfolios' => Portfolio::all(),
            'services' => Service::all(),
            'experiences' => Experience::all(),
            'blogs' => Blog::all(),
            'priceings' => Priceing::all(),
            'clients' => Client::all(),
            'teams' => Team::all(),
            'sliders' => Slider::orderBy('created_at', 'desc')->get(),
        ];
        return view('frontend.home.index', compact('data'));
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->withSuccess('Thank you for contact me.');
    }

    public function download()
    {
        $file = public_path('Certificate.png');
        return response()->download($file, 'CV.pdf');
    }

     public function showBlogDetails(Blog $blog){
        $data = [
            'setting' => Setting::first(),
            'about' => About::first(),
            'resumes' => Resume::all(),
            'portfolios' => Portfolio::all(),
            'services' => Service::all(),
            'experiences' => Experience::all(),
            'priceings' => Priceing::all(),
            'clients' => Client::all(),
            'blogs' => Blog::all(),
            'teams' => Team::all()
        ];
        return view('frontend.blog.blog-details', compact('data', 'blog'));
    }

     public function showTeamDetails(Team $team){
        $data = [
            'setting' => Setting::first(),
            'about' => About::first(),
            'resumes' => Resume::all(),
            'portfolios' => Portfolio::all(),
            'services' => Service::all(),
            'experiences' => Experience::all(),
            'blogs' => Blog::all(),
            'priceings' => Priceing::all(),
            'clients' => Client::all(),
            'teams' => Team::all()
        ];
        return view('frontend.team.team-details', compact('data', 'team'));
    }
}
