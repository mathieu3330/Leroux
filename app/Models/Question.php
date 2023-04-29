<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Question extends Model
{
    use HasFactory;

    /**
     * Get the user's first name.
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value),
        );
    }

    protected function options(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value),
        );
    }
}
