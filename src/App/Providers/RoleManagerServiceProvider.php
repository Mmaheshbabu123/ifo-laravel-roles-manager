<?php

namespace Packages\RoleManager\App\Providers;

use Packages\RoleManager\Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;

class RoleManagerServiceProvider extends ServiceProvider
{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
          $this->app->register(RouteServiceProvider::class);
    }
    public function boot()
    {
       $this->loadViewsFrom(__DIR__.'/../../resources/views', 'role-manager');
      //  $seed_list[] = 'Packages/RoleManager/Database/Seeders/DatabaseSeeder';
       $this->loadMigrationsFrom(__DIR__.'/../../Database/Migrations');
      // $this->loadSeeders($seed_list);

      //  parent::boot();
    //  $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    //  $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
     //$this->mergeConfigFrom(__DIR__.'/../Config/config.php','AccessGuard');
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

    protected function loadSeeders($seed_list){
$this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ((array) $seed_list as $path) {
                $seeder->call($seed_list);
                // here goes the code that will print out in console that the migration was succesful
            }
        });
    }
}
