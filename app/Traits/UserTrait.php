<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Lga;

trait UserTrait{

    public static function createOrUpdate($request)
    {
        $lga = Lga::find($request['lga']);

        $user = User::updateOrCreate(
                    ['email' => $request['email']],
                    [
                        'first_name' => $request['first_name'],
                        'last_name' => $request['last_name'],
                        'phone' => $request['phone'],
                        'state' => $lga->state->name,
                        'lga' => $lga->name,
                        'email' => $request['email'],
                        'address' => $request['address']
                    ]
                );
        return $user->id;
    }
}
