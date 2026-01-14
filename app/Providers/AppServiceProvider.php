<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        // Gate pour gérer (modifier/supprimer) un produit
        Gate::define('manage-product', function (User $user, Product $product) {
            // L'utilisateur peut gérer le produit seulement s'il en est le propriétaire
            return $user->id === $product->user_id;
        });

        // Gate pour voir un produit
        Gate::define('view-product', function (User $user, Product $product) {
            // L'utilisateur peut voir le produit s'il en est le propriétaire OU si le produit est public
            return $user->id === $product->user_id || $product->is_public;
        });
    }
}