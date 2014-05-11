<?php

class Click extends Eloquent {

    protected $table = 'clicks';

    public function profile() {
        return $this->belongsTo('Profile', 'clicker', 'uid');
    }

}
