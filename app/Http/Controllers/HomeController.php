<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home.index');
    }

    public function contact()
    {
        $data = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.contact.index', compact('data'));
    }

    public function destroy($id)
    {
        $contactDelete = Contact::find($id);
        $contactDelete->delete();
        return redirect()->back()->with('error', 'Contact has been successfully deleted.');
    }
}
