<?php

namespace Ashik\Pdf;

use Illuminate\Support\ServiceProvider;

class PdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/pdf.php', 'pdf'
        );

        $this->app->bind('mpdf', function($app) {
            return new PdfWrapper();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/pdf.php' => config_path("pdf.php"),
        ], "mpdf-config");
    }
}
