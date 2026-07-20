<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Auto-setup database untuk server Railway yang menghapus SQLite setiap kali deploy
        if (!app()->runningInConsole()) {
            try {
                if (!\Illuminate\Support\Facades\Schema::hasTable('users') || \App\Models\User::count() === 0) {
                    \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
                }
            } catch (\Exception $e) {
                // Abaikan jika terjadi error saat mengecek database pertama kali
            }
        }
    }
}
