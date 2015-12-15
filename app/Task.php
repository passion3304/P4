<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user() {
    	return $this->belongsTo('\App\User');
    }

     public function owner() {
        # Task belongs to Owner
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Owner');
    }
}
