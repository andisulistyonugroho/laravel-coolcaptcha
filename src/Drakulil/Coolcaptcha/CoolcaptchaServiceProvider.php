<?php namespace Drakulil\Coolcaptcha;

use Illuminate\Support\ServiceProvider;

class CoolcaptchaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('drakulil/coolcaptcha');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
    $this->app['coolcaptcha'] = $this->app->share(function($app)
    {
      return new Coolcaptcha;
    });

    $this->app->booting(function()
    {
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();
      $loader->alias('Coolcaptcha', 'Drakulil\Coolcaptcha\Facades\Coolcaptcha');
    });
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('coolcaptcha');
	}

}
