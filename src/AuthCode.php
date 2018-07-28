<?php

namespace Diadal\Passport;

use \Laravel\Passport\AuthCode as AuthCodeDiadal;
use \Emadadly\LaravelUuid\Uuids;

class AuthCode extends AuthCodeDiadal
{
    use Uuids;

    public function setClientIdAttribute($value)
    {   
        $this->attributes['client_id'] = strtoupper($value);
    }
    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = strtoupper($value);
    }


}
