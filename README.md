author: andisulistyonugroho@gmail.com<br>
package: laravel-drakulil-coolcaptcha

#A. What is this?
* This package is based on the beautifull php-cool-captcha
* Resources has been included internally, it did not need external resource like google etc
* Session to save  the captcha text is drakulil-coolcaptcha, this can be override by changing the setting.

##Override setting.
You can do it by issuing this code on routes.php (see basic usage)

        Coolcaptcha::set_config(array('session_var' => 'lontong'));

## Available parameters
* width
* height
* minWordLength
* session_var
* backgroundColor (in RGB array)
* colors (font color in RGB array)
    
        public $colors = array(
          array(27,78,181), // blue
          array(22,163,35), // green
          array(214,36,7),  // red
        );
            

#B. Basic usage
## Routes

    <?php
        /** /app/routes.php **/
        Route::get('/captcha', function()
        {
           //Coolcaptcha::set_config(array('session_var' => 'just-captcha'));
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
    ?>

## Image tag
To generate the image, call the captcha through route that has been specified above (/captcha, method GET)

    <img src="captcha" id="captcha" name="captcha">

To confirm the captcha, use the secound route (/confirm_captcha, method POST) u can use an ajax call to this route

#The End

