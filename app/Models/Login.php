<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Events\LogInEvent;

class Login extends Model
{
    public $fillable = ['email', 'token'];
    
    protected $dispatchesEvents = [
        'created' => LogInEvent::class,
    ];
    /**
     * @param $token
     */
    public static function userFromToken($token)
    {
        $query = self::where('token', $token)
            //->where('created_at', '>', Carbon::parse('-15 minutes'))
            ->first();

        return $query->email ?? null;
    }
}
