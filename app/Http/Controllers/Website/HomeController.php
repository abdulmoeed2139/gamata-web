<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(session('access_token')){
            return redirect()->route('index');
        } else{
            return view('auth.login');
        }
    }

    // public function community()
    // {
    //     return view('websitePages.community');
    // }

    public function product()
    {
        return view('websitePages.product');
    }

    // public function productInner()
    // {
    //     return view('websitePages.product-inner');
    // }

    // public function producttInner()
    // {
    //     return view('websitePages.productt-inner');
    // }

    public function element()
    {
        return view('websitePages.element');
    }

    public function welcome()
    {
        return view('welcome');
    }

}
