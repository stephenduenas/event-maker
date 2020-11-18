<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EventsRequest;

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
     * Index
     * @param string $sEventId
     * @return json
     */
    public function index(string $sEventId): \Illuminate\Http\JsonResponse
    {
        $aResult = $this->oEventsService->read((int)$sEventId);
        return response()->json($aResult, Response::HTTP_OK);
    }

    /**
     * Main Create
     * @param $sEventId string
     * @return json
     */
    public function create(EventsRequest $oEventsRequest, string $sEventId): \Illuminate\Http\JsonResponse
    {
        $aResult = $this->oEventsService->create((int)$sEventId);
        return response()->json($aResult, Response::HTTP_CREATED);
    }
}
