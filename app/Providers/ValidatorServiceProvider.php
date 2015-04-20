<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app['validator']->extend('pssemail', function ($attribute, $value, $parameters)
        {
        	$pss_email = $value;
        	$pss_ext = substr($pss_email, strpos($pss_email, "@") + 1);
            if($pss_ext == 'cnmipss.org'){
            	return $value;
            }
            
        });

        $this->app['validator']->extend('deptselect', function ($attribute, $value, $parameters)
        {
        	$department = $value;
        	
            if($department != 'None'){
            	return $value;
            }
            
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
