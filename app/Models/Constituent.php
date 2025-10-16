<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Constituent extends Model
{
    use HasUuids;
    protected $table = 'constituents';
    protected $fillable = [
        'uuid',
        'fname',
        'lname',
        'email',
        'phone',
        'pronouns',
    ];

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    public function uniqueIds()
    {
        return ['uuid'];
    }

    /**
     * Get the full name of the constituent.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->fname} {$this->lname}",
        );
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }
}
