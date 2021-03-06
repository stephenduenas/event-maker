<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App\Models
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 4:20 PM
 */
class Event extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_events';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'event_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'event_name',
        'start_date',
        'end_date',
    ];

    /**
     * Foreign Key
     * @var string
     */
    const FOREIGN_KEY = 'event_id';

     /**
     * Get the days for the events.
     */
    public function days()
    {
        return $this->hasMany('App\Models\EventDay', self::FOREIGN_KEY);
    }

}
