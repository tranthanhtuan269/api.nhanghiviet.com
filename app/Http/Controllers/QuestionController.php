<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;
use App\Transformers\QuestionTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class QuestionController extends Controller
{
    public function index(Request $request){
        if(isset($request['unit'])){
            $questions = Question::where('unit', '=', $request['unit'])->latestFirst()->paginate(10);
        }else if(isset($request['object'])){
            $questions = Question::where('object', '=', $request['object'])->latestFirst()->paginate(10);
        }else{
            $questions = Question::latestFirst()->paginate(10);
        }
        
        $questionsCollection = $questions->getCollection();

        return fractal()
                ->collection($questionsCollection)
                ->transformWith(new QuestionTransformer)
                ->paginateWith(new IlluminatePaginatorAdapter($questions))
                ->toArray();
    }

    public function show(Question $question)
    {
        return fractal()
                ->item($question)
                ->transformWith(new QuestionTransformer)
                ->toArray();
    }
}
