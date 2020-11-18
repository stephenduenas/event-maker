<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventDay
 * @package App\Models
 * @author Stephen Dueñas <semduenas@gmail.com>
 * @since 11/17/2020 4:20 PM
 */
class EventDay extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_event_days';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'event_day_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_day_id',
        'event_id',
        'day'
    ];

    /**
     * Get the event.
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

}
