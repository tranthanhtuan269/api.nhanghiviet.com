<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\District;
use App\Transformers\CityTransformer;
use App\Transformers\TownTransformer;

class DistrictTransformer extends TransformerAbstract
{
    protected   $availableIncludes = ['city' ,'towns'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(District $district)
    {
        return [
            'id' => $district->id,
            'name' => $district->name,
            'city' => $district->city,
            'slug' => $district->slug,
            'short_name' => $district->short_name
        ];
    }

    public function includeCity(District $district)
    {
        return $this->item($district->city, new CityTransformer);
    }

    public function includeTowns(District $district)
    {
        return $this->collection($district->towns, new TownTransformer);
    }
}
