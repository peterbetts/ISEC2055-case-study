<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{

    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    /**
     * withDefault() will return an empty User model if the rep_id is null,
     * preventing errors when trying to access the rep's name or email.
     */
    public function rep(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
