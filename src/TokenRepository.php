<?php

namespace Diadal\Passport;

use \Laravel\Passport\TokenRepository as TokenRepositoryDiadal;
use \Emadadly\LaravelUuid\Uuids;

class TokenRepository extends TokenRepositoryDiadal
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
