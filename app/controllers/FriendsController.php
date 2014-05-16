<?php

/**
 * Friends utility controller
 */
class FriendsController extends BaseController {

    public static function clicksToFbProfile($clicks, $friends) {
        $profiles = array();
        foreach ($clicks as $click) {
            foreach($friends as $friend) {
                if($click == $friend['id']) {
                    $profiles[] = $friend;
                }
            }
        }
        return $profiles;
    }

}
