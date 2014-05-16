<?php

class ApplicationController extends BaseController {

    var $facebook;
    var $user;
    var $friends;

    public function __construct() {
        $this->facebook = new Facebook(Config::get('facebook'));
        $friendsList = $this->facebook->api('/me/friends?fields=id,name,gender');
        $this->friends = $friendsList['data'];

        $this->user = Auth::user();

        // Cache data for views
        View::share("matches", $this->getMatch(false));
        View::share("clicks", $this->getClicks(false));
        View::share("friends", $this->friends);
        View::share("user", $this->user);
    }

    public function getIndex() {
        // Request friend list from Facebook
        // We truncate the friendlist for initial viewing
//        $clicks = Click::all();
//
//        foreach ($clicks as $click) {
//            $profile = Profile::where("uid", "=", $click->clicker)->get();
//            var_dump($click->profile);
//            //var_dump($profile[0]);
//
//            $queries = DB::getQueryLog();
//            $last_query = ($queries);
//            dd($last_query);
//        }

        Session::put("friends", $this->friends);
        $friends = $this->friends;
        shuffle($friends);
        $smallFriends = array_slice($friends, 0, 42);
        if (Auth::check()) {
            return View::make('jList', array('friends' => $smallFriends, 'me' => $this->user));
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
     * Gets the matches
     * @param boolean $view if set to true, method returns a view otherwise it returns the matches
     * @return to the matches page if user logged in. Else to homepage
     */
    public function getMatch($view = true) {
        $clicks = Click::where('clickee', '=', Auth::user()->profile->uid)->get();
        $clickIds = UtilitiesController::object_to_array($clicks, "clicker");
        $profiles = Profile::whereIn('uid', $clickIds)->get();

        if (Auth::check() && $view) {
            return View::make('matches', array('profiles' => $profiles));
        } elseif ($view) {
            return Redirect::to("/");
        } else {
            return $profiles;
        }
    }

    /**
     * YOLO let's try this
     * @return to the clicks page if user logged in. Else to homepage
     */
    public function getClicks($view = true) {

        if (Auth::check() && $view) {
            return View::make('clicks');
        } elseif ($view) {
            return Redirect::to("/");
        } else {
            $clicks = Click::where('clicker', '=', Auth::user()->profile->uid)->get();
            $clickIds = UtilitiesController::object_to_array($clicks, "clickee");
            $profiles = FriendsController::clicksToFbProfile($clickIds, $this->friends);
//            $profiles = Profile::whereIn('uid', $clickIds)->get();
//            $profiles->clickIds = $clickIds;
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
