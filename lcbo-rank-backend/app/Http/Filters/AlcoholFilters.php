<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class AlcoholFilters extends QueryFilter
{
    public function sortBy($column): Builder
    {
        return $this->builder->orderBy($column);
    }

    public function sortAsc($column): Builder
    {
        return $this->builder->orderBy($column, 'asc');
    }

    public function sortDesc($column): Builder
    {
        return $this->builder->orderBy($column, 'desc');
    }

    public function minPriceIndex($minPriceIndex): Builder
    {
        return $this->builder->where('price_index', '>=', (float)$minPriceIndex);
    }

    public function minPrice($minPrice): Builder
    {
        return $this->builder->where('price', '>=', $minPrice);
    }

    public function minVolume($minVolume): Builder
    {
        return $this->builder->where('volume', '>=', $minVolume);
    }

    public function minAlcoholContent($minAlcoholContent): Builder
    {
        return $this->builder->where('alcohol_content', '>=', $minAlcoholContent);
    }

    public function maxPriceIndex($maxPriceIndex): Builder
    {
        return $this->builder->where('price_index', '<=', (float)$maxPriceIndex);
    }

    public function maxPrice($maxPrice): Builder
    {
        return $this->builder->where('price', '<=', $maxPrice);
    }

    public function maxVolume($maxVolume): Builder
    {
        return $this->builder->where('volume', '<=', $maxVolume);
    }

    public function maxAlcoholContent($maxAlcoholContent): Builder
    {
        return $this->builder->where('alcohol_content', '<=', $maxAlcoholContent);
    }

    public function title($title): Builder
    {
        return $this->builder->where('title', $title);
    }

    public function brand($brand): Builder
    {
        return $this->builder->where('brand', $brand);
    }

    public function category($categories): Builder
    {
        return $this->builder->whereIn('category', $categories);
    }

    public function subcategory($subcategory): Builder
    {
        return $this->builder->where('subcategory', $subcategory);
    }

    public function country($country): Builder
    {
        return $this->builder->where('country', $country);
    }

    public function outOfStock($outOfStock): Builder
    {
        return $this->builder->where('out_of_stock', $outOfStock);
    }

    public function search($search): Builder // todo test this somehow
    {
        return $this->builder
            ->where('title', 'like', '%' . $search . '%');
    }
}
