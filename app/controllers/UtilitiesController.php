<?php

class UtilitiesController extends BaseController {

    public function getNotification($template) {
        return View::make("notifications." . $template);
    }

}
