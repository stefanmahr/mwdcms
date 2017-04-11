<?php

namespace Stefanmahr\Mwdcms;

use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/migrations/create_cms_slider_tables.php' => base_path('database/migrations/create_cms_slider_tables.php')]);
		
		$this->mergeConfigFrom(__DIR__ . '/config/cms.php', 'cms');
		$this->publishes([__DIR__ . '/config' => config_path()]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('cmsSlider', function() {
			
            return new Classes\cmsSlider;
			
        });
		
    }
}
