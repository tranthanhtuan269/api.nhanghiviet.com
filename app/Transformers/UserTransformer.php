<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'name' => $user->name,
            'phone' => $user->phone,
            'city' => $user->city,
            'district' => $user->district,
            'town' => $user->town,
            'address' => $user->address,
            'avatar' => 'http://quanlynhanghi.local/public/images/' . $user->avatar,
            'images' => $user->images,
            'lat' => $user->lat,
            'lng' => $user->lng
        ];
    }
}
