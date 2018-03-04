<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Unit;
use App\Transformers\ObjectTransformer;
use App\Transformers\QuestionTransformer;

class UnitTransformer extends TransformerAbstract
{
    protected   $availableIncludes = ['object' ,'questions'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Unit $unit)
    {
        return [
            'id' => $unit->id,
            'name' => $unit->name,
            'object' => $unit->object,
            'slug' => $unit->slug,
            'short_name' => $unit->short_name
        ];
    }

    public function includeObject(Unit $unit)
    {
        return $this->item($unit->object, new ObjectTransformer);
    }

    public function includeQuestions(Unit $unit)
    {
        return $this->collection($unit->questions, new QuestionTransformer);
    }
}
