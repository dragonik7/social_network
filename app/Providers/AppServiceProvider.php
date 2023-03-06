<?php

namespace App\Providers;

use App\Repositories\FileRepository;
use App\Repositories\Interface\FileInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(FileInterface::class, function ()
		{
			return new FileRepository();
		});
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
