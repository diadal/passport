<?php

namespace Diadal\Passport;

use Laravel\Passport\ClientRepository as ClientRepositoryDiadal;
use Webpatser\Uuid\Uuid;

class ClientRepository extends ClientRepositoryDiadal
{

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public function create($userId, $name, $redirect, $personalAccess = false, $password = false)
    {
        $client = Passport::client()->forceFill([
            'user_id' => strtoupper($userId),
            'name' => $name,
            'secret' => str_random(40),
            'redirect' => $redirect,
            'personal_access_client' => $personalAccess,
            'password_client' => $password,
            'revoked' => false,
        ]);

        $client->save();

        return $client;
    }
    public function createPersonalAccessClient($userId, $name, $redirect)
    {
        return tap($this->create($userId, $name, $redirect, true), function ($client) {
            $accessClient = Passport::personalAccessClient();
            $accessClient->client_id = $client->id;
            $accessClient->save();
        });
    }


}
