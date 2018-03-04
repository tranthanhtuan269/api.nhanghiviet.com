<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Object;
use App\Transformers\UnitTransformer;

class ObjectTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['units'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Object $object)
    {
        return [
            'id' => $object->id,
            'content' => $object->content
        ];
    }

    public function includeDistricts(Object $object)
    {
        return $this->collection($object->units, new UnitTransformer);
    }
}
