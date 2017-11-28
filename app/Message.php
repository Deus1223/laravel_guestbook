<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fileable = ['name';]// new

    /** new
     * to get the user of the message
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
