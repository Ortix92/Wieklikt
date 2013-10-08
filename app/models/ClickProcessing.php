<?php
namespace App\Models;

class Clicks extends Eloquent {

	public function Profiles() {
		$this->belongsTo('Profiles');
	}
	
}
