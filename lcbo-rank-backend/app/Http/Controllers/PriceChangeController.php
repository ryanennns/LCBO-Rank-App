<?php

namespace App\Http\Controllers;

use App\Http\Resources\PriceChangeResource;
use App\Models\Alcohol;
use Illuminate\Http\Request;

class PriceChangeController extends Controller
{
    public function index()
    {
        return PriceChangeResource::collection(
            Alcohol::has('priceChanges', '>', 1)
                ->orderBy('created_at')
                ->paginate(25)
        );
    }

    public function show(Alcohol $alcohol, Request $request)
    {
        return (new PriceChangeResource($alcohol))->toArray($request);
    }
}
