<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    // Table Name 
    protected $table = 'feeds';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true; 


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
