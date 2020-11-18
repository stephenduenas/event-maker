<?php

namespace App\Http\Controllers;

use App\Services\EventsService;

/**
 * Class EventsController
 * @package App\Http\Controllers
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 7:07 PM
 */
class EventsController extends Controller
{
    private $oEventsService;

    /**
     * Constructor
     * @param EventsService $oEventsService object
     */
    public function __construct(EventsService $oEventsService)
    {
        $this->oEventsService = $oEventsService;
    }

    /**
     * Main Creatae
     * @param $sEventId string
     * @return json
     */
    public function create(string $sEventId)
    {
        $aResult = $this->oEventsService->create((int)$sEventId);
        return response()->json($aResult);
    }
}
