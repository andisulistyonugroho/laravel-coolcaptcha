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

Route::get('/', function()
{
  return View::make('hello');
});

Route::get('/signup', function() 
{
  return View::make('frontend/signup');
});

Route::get('/captcha', function()
{
  // Override the settings
  // example using different session name to save the text
  // Coolcaptcha::set_config(array('session_var' => 'lontong'));
  echo Coolcaptcha::CreateImage();
});

Route::post('/confirm_captcha',function()
{
  $confirm_captcha = Input::get('confirm_captcha');
  $the_captcha_text = \Session::get('drakulil-coolcaptcha');
  if ($confirm_captcha == $the_captcha_text) {
    echo 'Match';
  } else {
    echo 'Not match';
  }
});
