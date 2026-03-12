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
        // Force HTTPS for asset() URLs
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Force PHP temp files into storage/tmp
        $tmp = storage_path('tmp');
        if (!file_exists($tmp)) {
            mkdir($tmp, 0775, true);
        }
        putenv('TMPDIR=' . $tmp);
        ini_set('upload_tmp_dir', $tmp);
        sys_temp_dir_override($tmp); // optional helper below
    }
    }
}
