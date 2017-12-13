<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Hotel;

class HotelTransformer extends TransformerAbstract
{
    protected   $availableIncludes = ['city', 'district', 'town', 'user'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Hotel $hotel)
    {
        return [
            'id' => $hotel->id,
            'name' => $hotel->name,
            'phone' => $hotel->phone,
            'city' => $hotel->city,
            'district' => $hotel->district,
            'town' => $hotel->town,
            'address' => $hotel->address,
            'images' => $hotel->images,
            'lat' => $hotel->lat,
            'lng' => $hotel->lng
        ];
    }
}
