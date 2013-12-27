<?php

class ApplicationController extends BaseController {

    public function getIndex() {

        /**
         * @todo It is necessary to test if it's faster to pass the friends array
         * to this method, or to get it here.
         */
        $facebook = new Facebook(Config::get('facebook'));
        $friendsList = $facebook->api('/me/friends?fields=id,name,gender');
        Session::put("friends", $friendsList['data']);
        $me = Auth::user();

        // We truncate the friendlist for initial viewing
        $friends = $friendsList["data"];
        shuffle($friends);
        $friends = array_slice($friends, 0, 42);
        if (Auth::check()) {
            return View::make('jList', array('friends' => $friends, 'me' => $me));
        } else {
            return Redirect::to('/');
        }
    }

    /**
     * This method saves the click relationship to the database
     * 
     * @param string $id the ID of the person who has been clicked
     */
    public function getClick($id) {
        if (Auth::check() && $id) {

            $click = new Click();
            $click->clickee = $id;


            $click->clicker = Auth::user()->getProfileID();

            if (!isset($click->clicker)) {
                // Session expired or something twonky going on, login again
                // Should we pass a message? 
                Redirect::to("/");
            }
            try {
                $click->save();
            } catch (Exception $e) {
                Redirect::to(URL::action("ApplicationController@getMatch"))->with("clicked", "Je hebt deze gebruiker al een keer aangeklikt");
            }

            return $this->getMatch();
        }
    }

    /**
     * @return a view which displays the clicks by the user.
     */
    public function getClickedFriends() {
        $clicks = Click::where('clicker', '=', Auth::user()->getProfileID())->get()->toArray();
        if (Auth::check()) {
            return View::make('matches', array('clicks' => $clicks));
        } else {
            return Redirect::to("/");
        }
    }

    /**
     * Gets the matches
     * @return to the matches page if user logged in. Else to homepage
     */
    public function getMatch() {
        $clicks = Click::where('clickee', '=', Auth::user()->getProfileID())->get()->toArray();
        if (Auth::check()) {
            return View::make('matches', array('clicks' => $clicks));
        } else {
            return Redirect::to("/");
        }
    }

    /**
     * Load friends inside a json encode object for displaying on the main page
     * @return json a json encoded page containing all friends from the needle in $_GET
     */
    public function getFriends() {
        $friends = Session::get("friends");
        $needle = Input::get("term");
        $sortedFriends = array();
        foreach ($friends as $key => $friend) {
            if (stristr($friend["name"], $needle)) {
                $sortedFriends[] = $friend;
            }
        }
        return View::renderEach("friend", $sortedFriends, "friend", "nofriends");
    }

}
