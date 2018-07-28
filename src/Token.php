<?php

namespace Diadal\Passport;

use \Laravel\Passport\Token as TokenDiadal;

class Token extends TokenDiadal
{
    
    public function setClientIdAttribute($value)
    {   
        $this->attributes['client_id'] = strtoupper($value);
    }
    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = strtoupper($value);
    }

}
