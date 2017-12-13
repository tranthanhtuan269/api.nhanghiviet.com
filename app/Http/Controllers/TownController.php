<?php

namespace App\Http\Controllers;

use App\Town;

use Illuminate\Http\Request;
use App\Transformers\TownTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class TownController extends Controller
{
    public function show(Town $town)
    {
        return fractal()
                ->item($town)
                ->parseIncludes(['district', 'hotels'])
                ->transformWith(new TownTransformer)
                ->toArray();
    }

    public function slug(string $slug){
        $town = Town::where("slug", "=", $slug)->first();
        return fractal()
                ->item($town)
                ->parseIncludes(['hotels'])
                ->transformWith(new TownTransformer)
                ->toArray();
    }
}
