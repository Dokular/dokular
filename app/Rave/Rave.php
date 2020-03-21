<?php
namespace App\Rave;

use Illuminate\Support\Facades\Facade;

class Rave extends Facade{

    public static function getFacadeAccessor()
    {
        return 'rave';
    }
}
