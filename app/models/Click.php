<?php

class Click extends Eloquent {

    protected $table = 'clicks';

    public function profile() {
        return $this->belongsTo('Profile', 'clicker', 'uid');
    }

    // Click::clickee($uid);
    public function scopeClickee($query, $uid) {
        return $query->where('clickee', '=', $uid);
    }
    
}
