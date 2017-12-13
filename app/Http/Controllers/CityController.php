<?php

namespace App\Http\Controllers;

use App\City;

use Illuminate\Http\Request;
use App\Transformers\CityTransformer;

class CityController extends Controller
{

	public function index(){
        $cities = City::get();

        return fractal()
                ->collection($cities)
                ->transformWith(new CityTransformer)
                ->toArray();
    }

    public function show(City $city)
    {
        return fractal()
                ->item($city)
                ->parseIncludes(['districts'])
                ->transformWith(new CityTransformer)
                ->toArray();
    }

    public function slug(string $slug){
        $city = City::where("slug", "=", $slug)->first();
        return fractal()
                ->item($city)
                ->parseIncludes(['districts'])
                ->transformWith(new CityTransformer)
                ->toArray();
    }
}
