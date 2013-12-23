<?php

class ApplicationController extends BaseController {

    public function getIndex() {

        /**
         * @todo It is necessary to test if it's faster to pass the friends array
         * to this method, or to get it here.
         */
        $facebook = new Facebook(Config::get('facebook'));
        $friendsList = $facebook->api('/me/friends');
        //dd($friendsList["data"]);
        Session::put("friends", $friendsList['data']);
        $me = Auth::user();
        if (Auth::check()) {
            return View::make('jList', array('friendsList' => $friendsList, 'me' => $me));
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
                Redirect::to("/");
            }
            try {
                $click->save();
            } catch (Exception $e) {
                Redirect::to(URL::action("ApplicationController@getMatch"))->with("clicked","Je hebt deze gebruiker al een keer aangeklikt");
            }

            return $this->getMatch();
        }
    }

    public function getMatch() {
        $clicks = Click::where('clickee', '=', Session::get("facebookid"))->get();
        if (Auth::check()) {
            return View::make('matches', array('clicks' => $clicks));
        } else {
            return Redirect::to("/");
        }
    }

    public function getFriends() {
        $friends = Session::get("friends");
        $needle = Input::get("term");
        $sortedFriends = array();
        foreach ($friends as $key => $friend) {
            if (stristr($friend["name"], $needle)) {
                $sortedFriends[] = $friend;
            }
        }
        return json_encode($sortedFriends);
    }

}