<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function __construct(EventsService $oEventsService)
    {
        $this->oEventsService = $oEventsService;
    }

    public function create($sEventId)
    {
        dump($this->oEventsService->create());
        dd($sEventId);
    }
}
