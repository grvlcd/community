<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CommunityOwner extends Pivot
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
