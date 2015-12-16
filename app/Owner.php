<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function task() {
        # owner has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Task');
    }

    public function getOwnersForDropdown() {

    $owners = $this->orderby('last_name','ASC')->get();

    $owners_for_dropdown = [];
    foreach($owners as $owner) {
        $owners_for_dropdown[$owner->id] = $owner->last_name.', '.$owner->first_name;
    }

    return $owners_for_dropdown;

    }
}
