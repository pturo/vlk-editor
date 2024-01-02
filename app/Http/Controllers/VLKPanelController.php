<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class VLKPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('vlkeditor.dashboard.index', compact('services'));
    }
}
