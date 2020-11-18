<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\EventsRepository;
use Illuminate\Support\Arr;

/**
 * Class EventsService
 * This is the business logic for event maker
 * @package App\Http\Service
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 7:15 PM
 */
class EventsService extends BaseService
{
    
    /**
     * Request
     * @param $oRequest object
     */
    private $oRequest;

    /**
     * Event Repository
     * @param $oEventsRepository object
     */
    private $oEventsRepository;

    /**
     * Constructor
     * @param $oRequest object
     */
    public function __construct(Request $oRequest, EventsRepository $oEventsRepository)
    {
        $this->oRequest = $oRequest;
        $this->oEventsRepository = $oEventsRepository;
    }

    /**
     * Main method for read
     * @param int $iEventId
     * @return array
     */
    public function read(int $iEventId)
    {
        return $this->oEventsRepository->read($iEventId)[0] ?? [];
    }

    /**
     * Main method for create
     * @param int $iEventId
     * @return array
     */
    public function create(int $iEventId)
    {
        $aRequestParams = $this->oRequest->all();
        $aRequestParams['event_id'] = $iEventId;
        /**
         * Add `day = []` if null/none.
         */
        $aEventsData = Arr::add($aRequestParams, 'day', []);
        $aDays = $this->wrapArrayValues($aEventsData['day'], 'day');
        $aEventsData['day'] = $aDays;
        return $this->oEventsRepository->create($aEventsData)[0] ?? [];
    }

}
