<?php namespace Hpolthof\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');
	}

	public function boot()
	{
		\Route::get('_admin_test', function() {
			return view('admin::layout.base');
		});

		$this->publishes([
			__DIR__.'/../../../almasaeed2010/adminlte/dist' => public_path('hpolthof/admin'),
			__DIR__.'/../../../almasaeed2010/adminlte/plugins' => public_path('hpolthof/admin/plugins'),
		], 'public');

		$this->publishes([
			__DIR__.'/../resources/loaders' => app_path('Admin'),
		], 'loaders');

		$this->publishes([
			__DIR__.'/../config/admin.php' => config_path('admin.php'),
		], 'config');


		$this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');


	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
