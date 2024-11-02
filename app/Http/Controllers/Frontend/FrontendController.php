<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function properties()
    {
        return view('frontend.properties.propertyList');
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
