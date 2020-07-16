<?php

namespace App\Providers;

use App\Services\PhpToJsService;
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
    //
    $this->app->bind('phpToJs', PhpToJsService::class);
    $this->app->bind('App\Services\PostService');
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
