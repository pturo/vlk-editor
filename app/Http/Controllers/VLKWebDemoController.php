<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Blog;

class VLKWebDemoController extends Controller
{
    public function index() {
        $services = Service::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $blog = Blog::latest()->get();
        return view('vlkeditor.webdemo.index', compact('services', 'testimonials', 'blog'));
    }
}
