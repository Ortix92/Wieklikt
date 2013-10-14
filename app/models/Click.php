<?php

class Click extends Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }

}