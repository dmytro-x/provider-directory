<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $providers = Provider::with('category')
            ->when($request->filled('category'), function ($q) use ($request) {
                $q->filterByCategory($request->input('category'));
            })
            ->get();

        return ProviderResource::collection($providers);
    }
}
