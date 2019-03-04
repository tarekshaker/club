<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sport
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sport query()
 * @mixin \Eloquent
 */
class Sport extends Model
{
    protected $table = 'sports';
    protected $fillable = array('name');

//    /**
//     * Get the sessions of the sport
//     */
//    public function sessions()
//    {
//        return $this->hasMany('App\Session','sport_id');
//    }

    /**
     * Get all of the bookings for the sport.
     */
    public function bookings()
    {
        return $this->hasManyThrough('App\Booking', 'App\Session');
    }

}
