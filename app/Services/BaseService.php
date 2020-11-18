<?php
namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class BaseService
 * @package App\Http\Service
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 7:15 PM
 */
class BaseService
{
    /**
     * Wrap array values to each key
     * @param $aData array
     * @param $sDesiredKey string
     * @return array
     */
    public function wrapArrayValues(array $aData, string $sDesiredKey)
    {
        return collect($aData)->map(function ($mData) use ($sDesiredKey) {
            return [
                $sDesiredKey => $mData
            ];
        })->toArray();
    }
}