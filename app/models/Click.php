<?php

class Click extends Eloquent {

    public function profile() {
        return $this->belongsTo('Profile','clickee','uid');
    }


}

