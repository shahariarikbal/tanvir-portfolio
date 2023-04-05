<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('backend.about.index', [
            'abouts' => About::first(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            //'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            //'dob' => 'required',
            //'freelance' => 'required',
            'fb_ads' => 'required',
            'google_ads' => 'required',
            'shopify' => 'required',
            'dropshipping' => 'required',
            'google_shopping' => 'required',
            'marketing_strategy' => 'required',
            // 'one_month' => 'required',
            // 'three_month' => 'required',
            // 'six_month' => 'required',
            // 'sales_funnel' => 'required',
        ]);

        if ($request->id){
            $about = About::find($request->id);
            if (isset($request->image)){
                if ($about->image){
                    file_exists(('about/').$about->image);
                }else {
                    unlink(public_path('/about/').$about->image);
                }
                $updateImage = time().'.'. $request->image->extension();

                $request->image->move(('about'), $updateImage);
                $about->image = $updateImage;
            }
            $about->description = $request->description;
            //$about->name = $request->name;
            $about->email = $request->email;
            $about->phone = $request->phone;
            $about->address = $request->address;
            //$about->dob = $request->dob;
            //$about->freelance = $request->freelance;
            $about->fb_ads = $request->fb_ads;
            $about->google_ads = $request->google_ads;
            $about->shopify = $request->shopify;
            $about->dropshipping = $request->dropshipping;
            $about->google_shopping = $request->google_shopping;
            $about->marketing_strategy = $request->marketing_strategy;
            $about->save();
            return redirect()->back()->with('success', 'About has been successfully updated.');
        }else{
            $file = $request->file('image');
            $aboutImage = time().'.' . $file->getClientOriginalExtension();
            $file->move('about/', $aboutImage);

            $about = new About();
            $about->description = $request->description;
            //$about->name = $request->name;
            $about->email = $request->email;
            $about->phone = $request->phone;
            $about->address = $request->address;
            //$about->dob = $request->dob;
            //$about->freelance = $request->freelance;
            $about->fb_ads = $request->fb_ads;
            $about->google_ads = $request->google_ads;
            $about->shopify = $request->shopify;
            $about->dropshipping = $request->dropshipping;
            $about->google_shopping = $request->google_shopping;
            $about->marketing_strategy = $request->marketing_strategy;
            $about->image = $aboutImage;
            $about->save();
            return redirect()->back()->with('success', 'About has been successfully updated.');
        }

        // try {

        // }catch (\Exception $exception){
        //     return redirect()->back()->with('error', $exception->getMessage());
        // }
    }
}
