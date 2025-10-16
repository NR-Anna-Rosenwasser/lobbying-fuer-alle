<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concern extends Model
{
    use HasUuids;
    protected $table = 'concerns';
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'parlch_checked',
        'past_concerns',
        'past_concerns_timespan',
        'past_concerns_details',
        'experts',
        'further_information',
        'constituent_id',
    ];

    public function constituent(): BelongsTo
    {
        return $this->belongsTo(Constituent::class);
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    public function uniqueIds()
    {
        return ['uuid'];
    }
}
