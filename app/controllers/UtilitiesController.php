<?php

class UtilitiesController extends BaseController {

    public function getNotification($template) {
        return View::make("notifications." . $template);
    }

    /**
     * Converts either an object to an array or stores the object's properties
     * inside an array
     * @param type $object the object that is being itterated over
     * @param string $nestedKey the key which is nested inside the object's property
     * @return array returns an array representation of the object or its properties 
     */
    public static function object_to_array($object, $nestedKey = false) {
        $array = array();
        foreach ($object as $value) {
            if ($nestedKey) {
                $array[] = $value->{$nestedKey};
            } else {
                $array[] = $value;
            }
        }
        return $array;
    }

}
