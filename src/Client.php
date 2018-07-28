<?php

namespace Diadal\Passport;

use \Laravel\Passport\Client as ClientDiadal;
use Emadadly\LaravelUuid\Uuids;

class Client extends ClientDiadal
{
    use Uuids;
    public $incrementing = false;
    
    public function getIdAttribute($value) 
    {
        return (strtolower($value));
    }

    public function setIdAttribute()
    {
        $id = \Uuid::generate(4);
        
        $this->attributes['id'] = strtoupper($id);  
        
    }
    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = strtoupper($value);
    }



    

}
