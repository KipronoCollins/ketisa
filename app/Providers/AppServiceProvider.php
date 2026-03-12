<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        putenv('TMPDIR=' . storage_path('tmp'));

        if (app()->environment('production')) {
        URL::forceScheme('https');
    }

    // Force PHP temporary files into storage/tmp
        $tmp = storage_path('tmp');
        if (!file_exists($tmp)) {
            mkdir($tmp, 0775, true);
        }

        putenv('TMPDIR=' . $tmp);
        ini_set('upload_tmp_dir', $tmp);
    }
}
