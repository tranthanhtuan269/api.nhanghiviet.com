<?php

namespace App\Http\Controllers;

use App\Unit;

use Illuminate\Http\Request;
use App\Transformers\UnitTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UnitController extends Controller
{
    public function show(Unit $unit)
    {
        return fractal()
                ->item($unit)
                ->parseIncludes(['object', 'questions'])
                ->transformWith(new UnitTransformer)
                ->toArray();
    }

    public function slug(string $slug){
        $unit = Unit::where("slug", "=", $slug)->first();
        return fractal()
                ->item($unit)
                ->parseIncludes(['questions'])
                ->transformWith(new UnitTransformer)
                ->toArray();
    }
}
