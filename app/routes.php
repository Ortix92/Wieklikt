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
                return View::make('user', array('data' => $data));
            } else {
                return View::make('home');
            }
        });

Route::get('logout', function() {
            Auth::logout();
            return Redirect::to('/');
        });

// Entry point for authentication      
Route::controller('login', array('as' => 'login', 'uses' => 'FacebookController'));

// Entry point for application logic
Route::controller('app', array('as' => 'application', 'uses' => 'ApplicationController'));
