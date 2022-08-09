<?php

namespace App\Http\Controllers;

use App\Models\Alcohol;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BeerController extends AlcoholController
{
    public function getDefault(Request $request): Collection
    {
        $numOfResults = min(
            $request->input('numOfResults', 10),
            AlcoholController::MAX_ALCOHOLS_RETURNED
        );
        return Alcohol::getByCategory(Alcohol::BEER, $numOfResults);
    }

    public function getEfficient(
        Request $request,
        String $category = Alcohol::BEER,
        String $subcategory = ''
    ): Collection
    {
        return parent::getEfficient($request, $category);
    }
}
