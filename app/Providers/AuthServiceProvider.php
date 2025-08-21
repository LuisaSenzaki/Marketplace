<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         Gate::define('admin', function ($user) {
        // Liste emails (ou IDs) que são admin
        $admins = [
            'lsenzaki@tv1.com.br',
            'outra.pessoa@empresa.com',
        ];

        return in_array($user->email, $admins, true);
    });
    }
}
