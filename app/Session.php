<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Session
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport query()
 * @mixin \Eloquent
 */
class Session extends Model
{
    protected $table = 'sessions';
    protected $fillable = array('sport_id','date','start_at','end_at','slots');

    /**
     * Get the bookings of the session.
     */
    public function bookings()
    {
        return $this->hasMany('App\Booking','session_id');
    }

    /**
     * Session is belong to sport
     */
    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

}
