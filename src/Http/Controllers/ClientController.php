<?php

namespace Diadal\Passport\Http\Controllers;


use Diadal\Passport\ClientRepository;
use \Laravel\Passport\Http\Controllers\ClientController as ClientControllerDiadal;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class ClientController extends ClientControllerDiadal
{
    /**
     * The client repository instance.
     *
     * @var \Laravel\Passport\ClientRepository
     */
    // protected $clients;

    /**
     * The validation factory implementation.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    // protected $validation;

    /**
     * Create a client controller instance.
     *
     * @param  \Laravel\Passport\ClientRepository  $clients
     * @param  \Illuminate\Contracts\Validation\Factory  $validation
     * @return void
     */
    public function __construct(ClientRepository $clients,
                                ValidationFactory $validation)
    {
        $this->clients = $clients;
        $this->validation = $validation;
    }

    
}
