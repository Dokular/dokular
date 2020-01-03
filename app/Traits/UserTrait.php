<?php
namespace App\Traits;

use App\User;

trait UserTrait{

    public function createOrUpdate($request)
    {

        $user = User::updateOrCreate(
                    ['email' => $request->post('email')],
                    [
                        'first_name' => $request->post('first_name'),
                        'last_name' => $request->post('last_name'),
                        'phone' => $request->post('phone'),
                        'state' => $request->post('state'),
                        'lga' => $request->post('lga'),
                        'email' => $request->post('email'),
                        'address' => $request->post('address')
                    ]
                );
        return $user->id;
    }
}
