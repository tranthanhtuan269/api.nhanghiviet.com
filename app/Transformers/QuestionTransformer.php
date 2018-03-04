<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Question;

class QuestionTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['object', 'unit', 'answer'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Question $question)
    {
        return [
            'id' => $question->id,
            'content' => $question->content,
            'correct_answer' => $question->correct_answer,
            'object' => $question->object,
            'unit' => $question->unit
        ];
    }

    public function includeUnit(Question $question)
    {
        return $this->item($question->unit, new UnitTransformer);
    }

    public function includeAnswers(Question $question)
    {
        return $this->collection($question->answers, new AnswerTransformer);
    }
}
