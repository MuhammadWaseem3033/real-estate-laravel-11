<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropertyListing;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $PropretyListings = PropertyListing::with('Category', 'propertyType', 'Images')->get()->toArray();
        // dd($PropretyListings);
        return view('frontend.index', compact('PropretyListings'));
    }

    public function singleProperty(Request $Req)
    {
        // dd($Req->slug);
        $Property = PropertyListing::where('slug', $Req->slug)->with('Category', 'propertyType', 'Images')->first();
        // dd($Property);
        return view('frontend.properties.single-property', compact('Property'));
    }

    public function properties()
    {
        $PropretyListings = PropertyListing::with('Category', 'propertyType', 'Images')->get()->toArray();
        return view('frontend.properties.propertyList', compact('PropretyListings'));
    }

    public function propertyType()
    {
        return view('frontend.properties.propertyType');
    }

    public function propertyAgent()
    {
        return view('frontend.properties.propertyAgent');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contect()
    {
        return view('frontend.contect');
    }

    public function polices()
    {
        return view('frontend.privacy-policy');
    }

    public function disclimer()
    {
        return view('frontend.disclimer');
    }

    public function termAndCondition()
    {
        return view('frontend.terms-&-condition');
    }
}
