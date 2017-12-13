<?php

namespace App\Http\Controllers;

use App\District;

use Illuminate\Http\Request;
use App\Transformers\DistrictTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class DistrictController extends Controller
{
    public function show(District $district)
    {
        return fractal()
                ->item($district)
                ->parseIncludes(['city', 'towns'])
                ->transformWith(new DistrictTransformer)
                ->toArray();
    }

    public function slug(string $slug){
        $district = District::where("slug", "=", $slug)->first();
        return fractal()
                ->item($district)
                ->parseIncludes(['towns'])
                ->transformWith(new DistrictTransformer)
                ->toArray();
    }
}
