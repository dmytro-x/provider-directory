<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return view('providers.index');
    }

    public function details(Provider $provider)
    {
        return view('providers.details', compact('provider'));
    }
}
