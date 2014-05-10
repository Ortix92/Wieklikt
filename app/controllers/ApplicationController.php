<?php

class ApplicationController extends BaseController {

    var $facebook;
    var $me;
    var $friends;

    public function __construct() {
        $this->facebook = new Facebook(Config::get('facebook'));
        $friendsList = $this->facebook->api('/me/friends?fields=id,name,gender');
        $this->friends = $friendsList['data'];

        $this->me = Auth::user();
        $this->me->clickedFriends = $this->getClickedFriends();

        // Cache data for views
        View::share("matches", $this->getMatch(false));
        View::share("friends", $this->friends);
        View::share("me", $this->me);
    }

    public function getIndex() {
        // Request friend list from Facebook
        // We truncate the friendlist for initial viewing
        Session::put("friends", $this->friends);
        $friends = $this->friends;
        shuffle($friends);
        $smallFriends = array_slice($friends, 0, 42);
        if (Auth::check()) {
            return View::make('jList', array('friends' => $smallFriends, 'me' => $this->me));
        } else {
            return Redirect::to('/');
        }
    }

    /**
     * This method saves the click relationship to the database
     * 
     * @param string $id the facebook uid of the person who has been clicked
     */
    public function getClick($id) {
        //@TODO: Add check if user has clicks left
        if (Auth::check() && $id) {
            $user = Auth::user();
            $click = new Click();
            $click->clickee = $id;


            $click->clicker = $user->getFacebookID();

            if (!isset($click->clicker)) {
                // Session expired or something twonky going on, login again
                // Should we pass a message? 
                Redirect::to("/");
            }
            try {
                $click->save();
                $user->profile->updateClickCount();
            } catch (Exception $e) {
                Redirect::to(URL::action("ApplicationController@getMatch"))->with("clicked", "Je hebt deze gebruiker al een keer aangeklikt");
            }

            return $this->getMatch();
        }
    }

    /**
     * @return mixed a view which displays the clicks by the user.
     */
    public function getClickedFriends() {
        $clicks = Click::where('clicker', '=', Auth::user()->profile->uid)->get()->toArray();
        return $clicks;
    }

    /**
     * Extracts all the clicker ID's and puts it in an array
     * @param object $clicks a Click object
     * @return array contains all the clicker id's
     */
    public function clickersToIdArray($clicks) {
        $array = array();
        foreach ($clicks as $click) {
            $array[] = $click->clicker;
        }
        return $array;
    }

    /**
     * Gets the profile corresponding to the clicker id
     * @param object $clicks a Click object
     * @return mixed an array of all the profile objects
     */
    public function getMatchProfile($clicks) {
        $clickIds = $this->clickersToIdArray($clicks);
        $profiles = Profile::whereIn('uid', $clickIds)->get();
        return $profiles;
    }

    /**
     * Gets the matches
     * @param boolean $view if set to true, method returns a view otherwise it returns the matches
     * @return to the matches page if user logged in. Else to homepage
     */
    public function getMatch($view = true) {
        $clicks = Click::where('clickee', '=', Auth::user()->profile->uid)->get();
        $profiles = $this->getMatchProfile($clicks);

        if (Auth::check() && $view) {
            return View::make('matches', array('profiles' => $profiles));
        } elseif ($view) {
            return Redirect::to("/");
        } else {
            return $profiles;
        }
    }

    /**
     * Load friends inside a json encode object for displaying on the main page
     * Returns 42 random friends when $_GET == "load.random"
     * @return View returns a View object
     */
    public function getFriends() {
        $friends = Session::get("friends");
        $needle = Input::get("term");
        $sortedFriends = array();
        if ($needle == 'load.random') {
            shuffle($friends);
            $friends = array_slice($friends, 0, 42);
            $sortedFriends = $friends;
        } elseif (stristr($needle, 'gender.')) {
            foreach ($friends as $key => $friend) {
                $genderArr = (explode(".", $needle));
                if (isset($friend["gender"]) && $friend["gender"] == end($genderArr)) {
                    $sortedFriends[] = $friend;
                }
            }
            shuffle($sortedFriends);
            $sortedFriends = array_slice($sortedFriends, 0, 42);
        } else {
            foreach ($friends as $key => $friend) {
                if (stristr($friend["name"], $needle)) {
                    $sortedFriends[] = $friend;
                }
            }
        }
        return View::renderEach("friend", $sortedFriends, "friend", "nofriends");
    }

}
