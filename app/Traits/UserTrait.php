<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Lga;

trait UserTrait{

    public static function createOrUpdate($request)
    {
        $delivery = $request->post('delivery');

        $lga = Lga::find($delivery['lga']);

        $user = User::updateOrCreate(
                    ['email' => $delivery['email']],
                    [
                        'first_name' => $delivery['first_name'],
                        'last_name' => $delivery['last_name'],
                        'phone' => $delivery['phone'],
                        'state' => $lga->state->name,
                        'lga' => $lga->name,
                        'email' => $delivery['email'],
                        'address' => $delivery['address']
                    ]
                );
        return $user->id;
    }
}
