<?php namespace Drakulil\Coolcaptcha\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Coolcaptcha extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'coolcaptcha'; }
 
}
