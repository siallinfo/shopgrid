<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.index');
    }
    public function productCategory()
    {
        return view('website.product-category.index');
    }
    public function productDetail()
    {
        return view('website.product-detail.index');
    }
}
