<?php namespace App\Controllers\Api;

use Illuminate\Support\ServiceProvider;

use App\Models\PartMaster;

class RepositoryServiceProvider extends ServiceProvider {
	/**
	 * Register the binding
	*
	* @return void
	*/
	public function register()
	{
		$this->app->bind('App\Controllers\Api\InvoiceRepository', function($app)
		{
			return new ExampleRepository(new PartMaster());
		});
		
	}
	
}
