<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

// Route::get('/', function()
// {
// 	return View::make('home');
// });
//Route::get('/', 'HomeController@showIndex');

/*
  |--------------------------------------------------------------------------
  | Facebook Login Route
  |--------------------------------------------------------------------------
  |
  | Here we route the facebook login call to the API
  |
 */

Route::get('/', function() {
            $data = array();

            if (Auth::check()) {
                $data = Auth::user();
            }
            return View::make('user', array('data' => $data));
        });

Route::get('logout', function() {
            Auth::logout();
            return Redirect::to('/');
        });

Route::get('login/fb', function() {
            $facebook = new Facebook(Config::get('facebook'));
            $params = array(
                'redirect_uri' => url('/login/fb/callback'),
                'scope' => 'email',
            );
            return Redirect::to($facebook->getLoginUrl($params));
        });


Route::get('login/fb/callback', function() {
            $code = Input::get('code');
            if (strlen($code) == 0)
                return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

            // Create Facebook Object and get the user
            $facebook = new Facebook(Config::get('facebook'));
            $uid = $facebook->getUser();

            if ($uid == 0)
                return Redirect::to('/')->with('message', 'There was an error');

            // Return facebook profile
            $me = $facebook->api('/me/friends');
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
        });

Route::get('/click/{id?}', function($id = null) {
            if ($id)
                return "Je hebt gebruiker met het id {$id} aangeklikt!";
            return "Je kan geen gebruiker met een leeg id aanklikken!";
        });

Route::get('/app', function() {

            /**
             * @todo It is necessary to test if it's faster to pass the friends array
             * to this route, or to get it here.
             */
            $data = new stdClass;
            $facebook = new Facebook(Config::get('facebook'));
            $friendsList = $facebook->api('/me/friends');
            $me = Auth::user();
            if (Auth::check()) {
                return View::make('list', array('friendsList' => $friendsList, 'me' => $me));
            } else {
                return Redirect::to('/');
            }
        });