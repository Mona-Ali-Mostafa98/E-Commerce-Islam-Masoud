<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $website_services = Service::where('status' ,'show')->latest()->get();

        return view('website.services' , compact('website_services'));
    }

}