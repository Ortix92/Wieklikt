<?php

class UserController extends ApplicationController {

    public function getIndex() {
        return View::make("user", array("data" => Auth::user()));
    }

}