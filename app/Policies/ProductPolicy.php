<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class ProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Product $product): bool
    {
        return $user->id === $product->user_id || $product->is_public;
    }

    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function create(?User $user): bool
    {
        return true;
    }

    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        return null;
    }
}
