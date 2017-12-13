<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\City;
use App\Transformers\DistrictTransformer;

class CityTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['districts'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
            'slug' => $city->slug,
            'short_name' => $city->short_name
        ];
    }

    public function includeDistricts(City $city)
    {
        return $this->collection($city->districts, new DistrictTransformer);
    }
}
