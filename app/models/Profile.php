<?php

class Profile extends Eloquent {

    public function user() {
        return $this->belongsTo('User','user_id');
    }

    public function click() {
        return $this->hasMany('Click','clickee', 'uid');
    }

    /**
     * Update the click count corresponding to the users profile
     * @param int $n Number by which the click count should be incremented with
     * @return boolean True if successful, else false
     */
    public function updateClickCount($n = 1) {
        $this->click_count = $this->click_count + $n;
        return $this->save();
    }

}