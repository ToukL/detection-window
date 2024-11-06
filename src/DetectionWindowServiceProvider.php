<?php

namespace Biigle\Modules\DetectionWindow;

use Biigle\Services\Modules;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DetectionWindowServiceProvider extends ServiceProvider {

   /**
   * Bootstrap the application events.
   *
   * @param Modules $modules
   * @param Router $router
   * @return void
   */
   public function boot(Modules $modules, Router $router)
   {
      $this->loadViewsFrom(__DIR__.'/ressources/views','detection-window');

      $router->group([
               'namespace' => 'Biigle\Modules\DetectionWindow\Http\Controllers',
               'middleware' => 'web',
         ], function ($router) {
            require __DIR__.'/Http/routes.php';
      });

      $this->publishes([
         __DIR__.'/public/assets' => public_path('vendor/detection-window'),
      ], 'public');

      $modules->register('detection-window', [
         'viewMixins' => [
            'videosSidebar',
         ]
      ]);
   }

   /**
   * Register the service provider.
   *
   * @return void
   */
   public function register()
   {
      $this->app->singleton('command.detection-window.publish', function ($app) {
          return new \Biigle\Modules\DetectionWindow\Console\Commands\Publish();
      });

      $this->commands([
          'command.detection-window.publish',
      ]);
   }
}