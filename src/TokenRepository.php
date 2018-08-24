<?php

namespace Diadal\Passport;

use \Laravel\Passport\TokenRepository as TokenRepositoryDiadal;
use \Webpatser\Uuid\Uuid;

class TokenRepository extends TokenRepositoryDiadal
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public function setClientIdAttribute($value)
    {   
        $this->attributes['client_id'] = strtoupper($value);
    }
    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = strtoupper($value);
    }

}
