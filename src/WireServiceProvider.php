<?php

namespace Rapkit\Wire;

use Illuminate\Support\ServiceProvider;

class WireServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		/**
		 * Register the wire middleware.
		 */
		$this->app['router']->aliasMiddleware('wire_interface', Http\Middleware\BeforeWireInterface::class);
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		/**
		 * Loading Wire Routes
		 */
		$this->loadRoutesFrom(__DIR__ . '/routes/web.php');

		/**
		 * ===> usage trans('wire::filename.key');
		 */
		$this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'wire');

		/**
		 * ===> usage wire::filename
		 */
		$this->loadViewsFrom(__DIR__ . "/resources/views", "wire");

		$this->publishes([
			__DIR__ . '/resources' => resource_path('views/wire'),
		]);

		/**
		 * Public assets for application interface to be used,
		 * these are going to be published into public folder.
		 */
		$this->publishes([
			__DIR__ . '/public/wire-css' => public_path('wire-assets/wire-css'),
			__DIR__ . '/public/wire-js' => public_path('wire-assets/wire-js'),
			__DIR__ . '/public/wire-images' => public_path('wire-assets/wire-images'),
		], 'public');

		/**
		 * Controllers will be published
		 */
		$this->publishes([
			__DIR__ . '/Http/Controllers' => base_path('app/Wire/Http/Controllers'),
		]);

		/**
		 * Identifier and Provider will be published
		 */
		$this->publishes([
			__DIR__ . '/Identifiers' => base_path('app/Wire/Identifiers'),
		]);

		/**
		 * Wire config file
		 */
		$this->publishes([
			__DIR__ . '/config/wire.php' => config_path('wire.php'),
		]);

		$this->commands([
			Console\Commands\IdentifierCache::class,
			Console\Commands\MakeIdentifier::class,
			Console\Commands\IdentifierLoad::class
		]);
	}
}
