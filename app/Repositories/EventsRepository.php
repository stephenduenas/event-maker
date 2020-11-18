<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Arr;

/**
 * Class EventsRepository
 * This is for model manipulation.
 * @package App\Repositories
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/18/2020 9:45 AM
 */
class EventsRepository
{
    /**
     * Event Model (Parent)
     * @var object $oModel
     */
    private $oModel;

    /**
     * Constructor
     * @param Event $oModel
     */
    public function __construct(Event $oModel)
    {
        $this->oModel = $oModel;
    }
    
    /**
     * Main method for create
     * @param array $aEventsData
     */
    public function create(array $aEventsData)
    {
        $oModel = $this->updateOrCreateParent($aEventsData);
        $this->removeExcessDays($oModel, Arr::flatten($aEventsData['day']));
        $this->updateOrCreateChild($oModel, $aEventsData['day']);
        $oModel = $oModel->refresh();
        return $oModel->with('days')->get()->toArray();
    }

    /**
     * Update or create parent
     * @param array $aEventsData
     * @return Event $oModel
     */
    private function updateOrCreateParent(array $aEventsData)
    {
        return $this->oModel->updateOrCreate(
            [
                'event_id' => $aEventsData['event_id']
            ],
            $aEventsData
        );
    }

    /**
     * Update or create child
     * @param Event $oModel
     * @param array $aDays
     */
    private function updateOrCreateChild(Event $oModel, array $aDays)
    {
        foreach($aDays as $aDay) {
            $oModel->days()->updateOrCreate(
                [
                    'day'      => $aDay['day'],
                ],
                $aDay
            );
        }
    }

    /**
     * Remove Excess Days
     * @return int
     */
    private function removeExcessDays(Event $oModel, array $aDays)
    {
        return $oModel->days()->whereNotIn('day', $aDays)->delete();
    }

}
