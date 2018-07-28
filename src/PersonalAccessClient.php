<?php

namespace Diadal\Passport;

use \Laravel\Passport\PersonalAccessClient as PersonalAccessClientDiadal;
use \Emadadly\LaravelUuid\Uuids;

class PersonalAccessClient extends PersonalAccessClientDiadal
{
    // do not remove uuids
    use Uuids;
    public $incrementing = false;
    
    public function getIdAttribute($value) 
    {
        return (strtolower($value));
    }
    public function setIdAttribute($value)
    {
        
        $this->attributes['id'] = strtoupper($value);  
        
    }
    public function setClientIdAttribute($value)
    {   
        $this->attributes['client_id'] = strtoupper($value);
    }
    

}
