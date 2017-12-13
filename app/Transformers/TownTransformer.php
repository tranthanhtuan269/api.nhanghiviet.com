<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Town;
use App\Transformers\DistrictTransformer;
use App\Transformers\UserTransformer;

class TownTransformer extends TransformerAbstract
{
    protected   $availableIncludes = ['district', 'hotels'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Town $town)
    {
        return [
            'id' => $town->id,
            'name' => $town->name,
            'slug' => $town->slug,
            'short_name' => $town->short_name
        ];
    }

    public function includeDistrict(Town $town)
    {
        return $this->item($town->district, new DistrictTransformer);
    }

    public function includeHotels(Town $town)
    {
        return $this->collection($town->users, new UserTransformer);
    }
}
