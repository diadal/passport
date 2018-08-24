<?php

namespace Diadal\Passport;

use \Laravel\Passport\PersonalAccessClient as PersonalAccessClientDiadal;
use \Webpatser\Uuid\Uuid;

class PersonalAccessClient extends PersonalAccessClientDiadal
{
    
    public $incrementing = false;
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public function getIdAttribute($value) 
    {
        return (strtolower($value));
    }
    public function setIdAttribute($value)
    {
        
        $this->attributes['id'] = strtoupper(Uuid::generate());  
        
    }
    public function setClientIdAttribute($value)
    {   
        $this->attributes['client_id'] = strtoupper($value);
    }
    

}
