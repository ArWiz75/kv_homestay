<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    // ...

    public function boot(): void
    {
        // Paksa Laravel menggunakan HTTPS jika diakses melalui Ngrok
        if (str_contains(env('APP_URL'), 'ngrok')) {
            URL::forceScheme('https');
        }
    }
}