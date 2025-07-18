<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait AuthorizesOwnership
{
    public function authorizeOwnerOrFail(Model $model): void
    {
        if ($model->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
