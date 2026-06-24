<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('id', 'asc')->paginate(4);
        return view('pages.services', compact('services'));
    }

    public function show($id)
    {
        $service = Services::findOrFail($id);
        return view('pages.services-detail', compact('service'));
    }
}
