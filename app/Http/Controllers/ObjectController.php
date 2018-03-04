<?php

namespace App\Http\Controllers;

use App\Object;

use Illuminate\Http\Request;
use App\Transformers\ObjectTransformer;

class ObjectController extends Controller
{

	public function index(){
        $objects = Object::get();

        return fractal()
                ->collection($objects)
                ->transformWith(new ObjectTransformer)
                ->toArray();
    }

    public function show(Object $object)
    {
        return fractal()
                ->item($object)
                ->parseIncludes(['units'])
                ->transformWith(new ObjectTransformer)
                ->toArray();
    }

    public function slug(string $slug){
        $object = Object::where("slug", "=", $slug)->first();
        return fractal()
                ->item($object)
                ->parseIncludes(['units'])
                ->transformWith(new ObjectTransformer)
                ->toArray();
    }
}
