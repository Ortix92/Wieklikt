<?php

class FacebookController extends BaseController {

    public function getIndex() {
        return Redirect::to('/login/fb');
    }

    public function getFb() {
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('/login/fb/callback'),
            'scope' => 'email',
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }

    public function getFbCallback() {
        $code = Input::get('code');
        if (strlen($code) == 0)
            return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

        // Create Facebook Object and get the user
        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();

        if ($uid == 0)
            return Redirect::to('/')->with('message', 'There was an error');

        // Return facebook profile
        $me = $facebook->api('/me');
        $profile = Profile::whereUid($uid)->first();

        // In case user doesn't exist in db, create it.
        if (empty($profile)) {

            $user = new User;
            $user->name = $me['first_name'] . ' ' . $me['last_name'];
            $user->email = $me['email'];
            $user->photo = 'https://graph.facebook.com/' . $me['username'] . '/picture?type=large';

            $user->save();

            $profile = new Profile();
            $profile->uid = $uid;
            $profile->username = $me['username'];
            $profile = $user->profiles()->save($profile);
        }

        $profile->access_token = $facebook->getAccessToken();
        $profile->save();

        $user = $profile->user;

        Auth::login($user);

        return Redirect::to('/app');
    }

}