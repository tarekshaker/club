<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Booking
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport query()
 * @mixin \Eloquent
 */
class Booking extends Model
{
    protected $table = 'bookings';

    /**
     * Get the session that owns the booking.
     */
    public function session()
    {
        return $this->belongsTo('App\Session');
    }


}
