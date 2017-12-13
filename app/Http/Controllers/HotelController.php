<?php

namespace App\Http\Controllers;

use App\Hotel;

use Illuminate\Http\Request;
use App\Transformers\HotelTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class HotelController extends Controller
{
    public function index(Request $request){
        if(isset($request['town'])){
            $hotels = Hotel::where('town', '=', $request['town'])->latestFirst()->paginate(10);
        }else if(isset($request['district'])){
            $hotels = Hotel::where('district', '=', $request['district'])->latestFirst()->paginate(10);
        }else if(isset($request['city'])){
            $hotels = Hotel::where('city', '=', $request['city'])->latestFirst()->paginate(10);
        }else{
            $hotels = Hotel::latestFirst()->paginate(10);
        }
        
        $hotelsCollection = $hotels->getCollection();

        return fractal()
                ->collection($hotelsCollection)
                ->transformWith(new HotelTransformer)
                ->paginateWith(new IlluminatePaginatorAdapter($hotels))
                ->toArray();
    }

    public function show(Hotel $hotel)
    {
        return fractal()
                ->item($hotel)
                ->transformWith(new HotelTransformer)
                ->toArray();
    }
}
