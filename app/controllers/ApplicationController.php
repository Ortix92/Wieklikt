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
            if (!Session::has("facebookid")) {
                $click->clicker = Session::get("facebookid");
            } else {
                 $click->clicker = Auth::user()->profiles->uid;
            }

            if (!isset($click->clicker)) {
                // Session expired or something twonky going on, login again
                Redirect::to("/");
            }
            $click->save();

            $event = Event::fire('application.click');

            return $this->getMatch();
        }
    }

    public function getMatch() {
        $clicks = Click::where('clickee', '=', Auth::user()->id)->get();
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