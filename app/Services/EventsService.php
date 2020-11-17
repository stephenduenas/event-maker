<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class EventsService
 * This is the business logic for event maker
 * @package App\Http\Service
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 7:15 PM
 */
class EventsService
{
    
    private $oRequest;

    /**
     * Constructor
     * @param $oRequest object
     */
    public function __construct(Request $oRequest)
    {
        $this->oRequest = $oRequest;
    }

    public function create()
    {
        dd('business logic');
    }
}