<?php

class ApplicationController extends BaseController {

    public function getIndex() {

        /**
         * @todo It is necessary to test if it's faster to pass the friends array
         * to this method, or to get it here.
         */
        $data = new stdClass;
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
            $click->clicker = Auth::user()->id;
            $click->save();

            $event = Event::fire('application.click');

            return $this->getMatch();
        }
    }

    public function getMatch() {
        $clicks = Click::where('clicker', '=', Auth::user()->id)->get();
        foreach ($clicks as $click) {
            echo $click->clickee . "\n";
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