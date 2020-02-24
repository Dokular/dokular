<?php
namespace App\Traits;

use App\Models\User;
use App\Models\State;

trait UserTrait{

    public static function createOrUpdate($request)
    {
        $user = User::updateOrCreate(
                    ['email' => $request['email']],
                    [
                        'first_name' => $request['first_name'],
                        'last_name' => $request['last_name'],
                        'phone' => $request['phone'],
                        'state' => State::find($request['state_id'],['name'])->name,
                        'lga' => $request['lga'],
                        'email' => $request['email'],
                        'address' => $request['address']
                    ]
                );
        return $user->id;
    }
}
