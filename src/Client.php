<?php

namespace Diadal\Passport;

use \Laravel\Passport\Client as ClientDiadal;
use \Webpatser\Uuid\Uuid;

class Client extends ClientDiadal
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

    public function setIdAttribute()
    {
        $id = Uuid::generate();
        
        $this->attributes['id'] = ($id);  
        
    }
    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = ($value);
    }



    

}
