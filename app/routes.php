<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here are all the application routes located
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

Route::get('logout', array('as' => 'logout', function() {
        Auth::logout();
        return Redirect::to('/');
    }));

// Entry point for authentication      
Route::controller('login', 'FacebookController');

// Entry point for application logic
Route::controller('app', 'ApplicationController');

// Entry point for notifications
Route::controller('util', 'UtilitiesController');

App::missing(function($exception) {
            return Response::view('errors.404', array(), 404);
        });